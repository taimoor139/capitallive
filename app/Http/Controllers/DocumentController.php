<?php

namespace App\Http\Controllers;

use App\Events\DocumentUpload;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public function index()
    {

        $idCardFront = Document::query()->where(['user_id' => Auth::user()->id, 'document' => 'id_card_front'])->first();
        $idCardBack = Document::query()->where(['user_id' => Auth::user()->id, 'document' => 'id_card_back'])->first();
        $proofOfResidence = Document::query()->where(['user_id' => Auth::user()->id, 'document' => 'residence'])->first();
        $affidavit = Document::query()->where(['user_id' => Auth::user()->id, 'document' => 'affidavit'])->first();
        $affidavitSelfie = Document::query()->where(['user_id' => Auth::user()->id, 'document' => 'affidavit_selfie'])->first();

        return view('user.documents.kycDocuments', compact('idCardFront', 'idCardBack', 'proofOfResidence', 'affidavit', 'affidavitSelfie'));
    }

    public function verify(Request $request)
    {
        if ($request->file('id_card_front') && $request->file('id_card_back')) {
            $file = $request->file('id_card_front');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'uploads/kyc/' . Auth::user()->id . '/';

            $document = Document::query()->where(['user_id' => Auth::user()->id, 'document' => 'id_card_front'])->first();
            if (!$document) $document = new Document();
            $document->user_id = Auth::user()->id;
            $document->document = 'id_card_front';
            $document->document_file = $filename;
            $document->status = 0;
            if ($document->save()) {
                $file->move($destinationPath, $file->getClientOriginalName());
            }


            $file = $request->file('id_card_back');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'uploads/kyc/' . Auth::user()->id . '/';
            $document = Document::query()->where(['user_id' => Auth::user()->id, 'document' => 'id_card_back'])->first();
            if (!$document) $document = new Document();
            $document->user_id = Auth::user()->id;
            $document->document = 'id_card_back';
            $document->document_file = $filename;
            $document->status = 0;
            if ($document->save()) {
                $file->move($destinationPath, $file->getClientOriginalName());
            }
            event(new DocumentUpload($document));
            return redirect()->back()->with('success', 'Document submitted successfully!');
        }

        if ($request->file('residence')) {
            $file = $request->file('residence');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'uploads/kyc/' . Auth::user()->id . '/';

            $document = Document::query()->where(['user_id' => Auth::user()->id, 'document' => 'residence'])->first();
            if (!$document) $document = new Document();
            $document->user_id = Auth::user()->id;
            $document->document = 'residence';
            $document->document_file = $filename;
            $document->status = 0;
            if ($document->save()) {
                $file->move($destinationPath, $file->getClientOriginalName());
                return redirect()->back()->with('success', 'Document submitted successfully!');
            } else {
                return redirect()->back()->with('error', 'Something went wrong !');
            }
        }

        if ($request->file('affidavit')) {
            $file = $request->file('affidavit');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'uploads/kyc/' . Auth::user()->id . '/';

            $document = Document::query()->where(['user_id' => Auth::user()->id, 'document' => 'affidavit'])->first();
            if (!$document) $document = new Document();
            $document->user_id = Auth::user()->id;
            $document->document = 'affidavit';
            $document->document_file = $filename;
            $document->status = 0;
            if ($document->save()) {
                $file->move($destinationPath, $file->getClientOriginalName());
                return redirect()->back()->with('success', 'Document submitted successfully!');
            } else {
                return redirect()->back()->with('error', 'Something went wring !');
            }

        }

        if ($request->file('affidavit_selfie')) {
            $file = $request->file('affidavit_selfie');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'uploads/kyc/' . Auth::user()->id . '/';

            $document = Document::query()->where(['user_id' => Auth::user()->id, 'document' => 'affidavit_selfie'])->first();
            if (!$document) $document = new Document();
            $document->user_id = Auth::user()->id;
            $document->document = 'affidavit_selfie';
            $document->document_file = $filename;
            $document->status = 0;
            if ($document->save()) {
                $file->move($destinationPath, $file->getClientOriginalName());
                return redirect()->back()->with('success', 'Document submitted successfully!');
            } else {
                return redirect()->back()->with('error', 'Something went wring !');
            }

        }
    }

    public function documents()
    {
        $documents = Document::all();

        return view('admin.document.index', compact('documents'));
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'status' => 'required',
            'document_id' => 'required'
        ]);

        if ($validate) {
            $update = Document::query()->where('id', $request->document_id)->update([
                'status' => $request->status
            ]);

            if ($update) {
                return redirect()->back()->with('success', 'Document Status changed successfully!');
            } else {
                return redirect()->back()->with('error', 'Something went wring !');

            }
        }
    }

    public function destroy($id)
    {
        $document = Document::query()->where('id', $id);
        if ($document) {
            $delete = $document->delete();
            if ($delete) {
                return redirect()->back()->with('success', 'Document deleted successfully!');
            } else {
                return redirect()->back()->with('error', 'Something went wring !');

            }
        }
    }
}
