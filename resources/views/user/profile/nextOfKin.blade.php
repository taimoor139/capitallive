@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">NEXT OF KIN</h5>
                                <form method="post" class="row g-3"
                                    action="https://tokyosecurities.com/my-profile/nok">
                                    <input type="hidden" name="_token" value="8Ac8sEpFAkT42hNsxtuPeusexEey6h8RFZgYPKTd">
                                    <div class="col-md-6 ">
                                        <label for="Job" class="form-label">Name</label>
                                        <input type="text" name="name" id="nokName" placeholder="Full Name" value=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="Job" class="form-label">Email</label>
                                        <input type="text" name="email" id="nokEmail" placeholder="Enter a Valid Email"
                                            value="" class="form-control">
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <label for="Job" class="form-label">Phone</label>
                                        <input type="tel" name="phone" class="form-control phone" value="" autocomplete="">
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="Job" class="form-label">Relation</label>
                                        <select name="relation" class="form-control nokRelation" data-width="100%">
                                            <option value="father">
                                                Father
                                            </option>
                                            <option value="mother">
                                                Mother
                                            </option>
                                            <option value="brother">
                                                Brother
                                            </option>
                                            <option value="sister">
                                                Sister
                                            </option>
                                            <option value="son">
                                                Son
                                            </option>
                                            <option value="daughter">
                                                Daughter
                                            </option>
                                            <option value="other">
                                                Other
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 ">
                                        <label for="Job" class="form-label">Shipping Address</label>
                                        <textarea name="shipping_address" class="form-control" rows="4" placeholder="Enter Shipping Details"></textarea>
                                    </div>
                                    <div class="col-md-6 d-none" id="nokOtherRelationSection">
                                        <label for="Job" class="form-label">OtherRelation</label>
                                        <input type="text" name="other_relation" class="form-control" value=""
                                            id="nokOtherRelation" placeholder="other relations ship">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
