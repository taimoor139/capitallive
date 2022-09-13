<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Referral;
use Illuminate\Http\Request;
use Auth;

class NetworkController extends Controller
{
    public function index(){
        $totalLeftMembers = 0;
        $leftMembers = array();
        $rightMembers = array();

        $_totalLeftMembers = Referral::query()->where(['referrer_name' => Auth::user()->username, 'position' => 0])->whereNotNull(['user_id']);
        $totalLeftMembers = $_totalLeftMembers->count();
        $_totalLeftMembers = $_totalLeftMembers->get();
        if($_totalLeftMembers){
            foreach ($_totalLeftMembers as $left){
                if($left->user){
                    $totalLeftMembers += $left->user->childs->count();
                    foreach($left->user->childs as $leftMember){
                        if($leftMember->user){
                            $totalLeftMembers += $this->childCount($leftMember->user->username);
                        }
                    }
                }

            }
        }

        $totalRightMembers = 0;
        $_totalRightMembers = Referral::query()->where(['referrer_name' => Auth::user()->username, 'position' => 1])->whereNotNull(['user_id']);
        $totalRightMembers = $_totalRightMembers->count();
        $_totalRightMembers = $_totalRightMembers->get();
        if($_totalRightMembers){
            foreach ($_totalRightMembers as $right){
                if($right->user){
                    $totalRightMembers += $right->user->childs->count();
                    foreach($right->user->childs as $rightMember){
                        if($rightMember->user){
                            $totalRightMembers += $this->childCount($rightMember->user->username);
                        }

                    }
                }

            }
        }


        $leftMembers = Referral::query()->with('user')->where(['referrer_name' => Auth::user()->username, 'position' => 0])->get();
        $rightMembers = Referral::query()->with('user')->where(['referrer_name' => Auth::user()->username, 'position' => 1])->get();

        $points = Point::query()->where('user_id', Auth::user()->id)->first();

        return view('user.network.genealogy', compact('totalLeftMembers', 'totalRightMembers', 'leftMembers', 'rightMembers', 'points'));
    }

    public function childCount($username){
        $_totalMembers = Referral::query()->where('referrer_name', $username)->whereNotNull(['user_id']);
        $totalMembers = $_totalMembers->count();
        $_totalMembers = $_totalMembers->get();
        if($_totalMembers){
            foreach ($_totalMembers as $members){
                if($members->user){
                    $totalMembers += $members->user->childs->count();
                    foreach($members->user->childs as $member){
                        if($member->user){
                            $totalMembers += $this->childCount($member->user->username);
                        }
                    }
                }

            }
        }
        return $totalMembers;
    }

    public function members(Request $request){
        $members = array();
        if($request->username){
            $referrals = Referral::query()->with('user')->where('referrer_name', $request->username)->get();
            if($referrals){
                foreach ($referrals as $referral){
                    $data = array();
                    if($referral->user){
                        $data['name'] = $referral->user->name;
                        $data['username'] = $referral->user->username;
                        $data['ref_by'] = $referral->user->referral->referrer_name;
                        $data['rank'] = $referral->user->rankAward->title ?? '';
                        $data['status'] = ($referral->user->status == 1 ? 'Banned' : 'Active');
                        $data['position'] = ($referral->position == 0 ? "Left" : "Right");
                        $members[] = $data;
                    }
                }
            }
        }

        return $members;
    }
}
