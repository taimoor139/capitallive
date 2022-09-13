@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row align-items-center mb-30 justify-content-between">
                <div class="col-lg-6 col-sm-6">
                    <h6 class="page-title">User Detail</h6>
                </div>
                <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
                </div>
            </div>

            <div class="row mb-none-30">

                <div class="col-xl-3 col-lg-5 col-md-5 mb-30">

                    <div class="card b-radius--10 overflow-hidden box--shadow1">
                        <div class="card-body p-0">
                            <div class="p-3 bg--white">
                                <div class="">
                                    @if($user->image)
                                        <img src="{{url('/uploads/profile_pictures/'.$user->image)}}"
                                             alt="profile-image" class="b-radius--10 w-100">
                                    @else
                                        <img src="https://script.viserlab.com/bisurv/assets/images/avatar.png"
                                             alt="profile-image" class="b-radius--10 w-100">
                                    @endif

                                </div>
                                <div class="mt-15">
                                    <h4 class="">{{ $user->name }}</h4>
                                    <span class="text--small">Joined At <strong>{{ date_format($user->created_at, 'd M, Y H:i A') }}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                        <div class="card-body">
                            <h5 class="mb-20 text-muted">User information</h5>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Username <span class="font-weight-bold">{{ $user->username }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Sponsor <span class="font-weight-bold"> {{ $user->sponsor ?? 'N/A' }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Balance <span class="font-weight-bold"> {{ $user->balance->balance ?? 0 }}
                                        USD </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Status @if($user->status == 1)
                                        <span class="badge badge-pill bg--danger">Banned</span>
                                    @else
                                        <span class="badge badge-pill bg--success">Active</span>

                                    @endif
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-7 col-md-7 mb-30">
                    <div class="row mb-none-30">
                        <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                            <div class="dashboard-w1 bg--primary b-radius--10 box-shadow has--link">
                                <a href="#"
                                   class="item--link"></a>
                                <div class="icon">
                                    <i class="fa fa-credit-card"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers">
                                        <span class="amount">{{ $user->deposits->sum('amount') ?? 0 }}</span>
                                        <span class="currency-sign">USD</span>
                                    </div>
                                    <div class="desciption">
                                        <span>Total Deposit</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                            <div class="dashboard-w1 bg--red b-radius--10 box-shadow has--link">
                                <a href="#"
                                   class="item--link"></a>
                                <div class="icon">
                                    <i class="fa fa-wallet"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers">
                                        <span class="amount">{{ $user->withdraws->sum('amount') ?? 0 }}</span>
                                        <span class="currency-sign">USD</span>
                                    </div>
                                    <div class="desciption">
                                        <span>Total Withdraw</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- dashboard-w1 end -->

                        <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                            <div class="dashboard-w1 bg--dark b-radius--10 box-shadow has--link">
                                <a href="#"
                                   class="item--link"></a>
                                <div class="icon">
                                    <i class="fa fa-exchange-alt"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers">
                                        <span class="amount">{{ $user->transactions->count() ?? 0 }}</span>
                                    </div>
                                    <div class="desciption">
                                        <span>Total Transaction</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- dashboard-w1 end -->


                        <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                            <div class="dashboard-w1 bg--info b-radius--10 box-shadow has--link">
                                <a href="#"
                                   class="item--link"></a>
                                <div class="icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers">
                                        <span class="amount">{{ $user->deposits->where('status', 100)->sum('amount') ?? 0 }}</span>
                                        <span class="currency-sign">USD</span>
                                    </div>
                                    <div class="desciption">
                                        <span>Total Invest</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                            <div class="dashboard-w1 bg--indigo b-radius--10 box-shadow has--link">
                                <a href="#"
                                   class="item--link"></a>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers">
                                        <span class="amount">{{ $directBonus ?? 0 }}</span>
                                        <span class="currency-sign">USD</span>
                                    </div>
                                    <div class="desciption">
                                        <span>Total Direct Bonus</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                            <div class="dashboard-w1 bg--10 b-radius--10 box-shadow has--link">
                                <a href="#"
                                   class="item--link"></a>
                                <div class="icon">
                                    <i class="fa fa-tree"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers">
                                        <span class="amount">{{ $networkBonus ?? 0 }}</span>
                                        <span class="currency-sign">USD</span>
                                    </div>
                                    <div class="desciption">
                                        <span>Total Network Bonus</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mt-50">
                        <div class="card-body">
                            <h5 class="card-title mb-50 border-bottom pb-2">Information</h5>

                            <form action="{{ route('update-user', $user->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">Name<span
                                                        class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="name"
                                                   value="{{ $user->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">Email <span
                                                        class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email"
                                                   value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label  font-weight-bold">Mobile Number <span
                                                        class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="mobile"
                                                   value="{{ $user->number }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">Address </label>
                                            <input class="form-control" type="text" name="address"
                                                   value="{{ $user->address }}">
                                            <small class="form-text text-muted"><i class="fa fa-info-circle"></i> House
                                                number, street address
                                            </small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label font-weight-bold">City </label>
                                            <input class="form-control" type="text" name="city"
                                                   value="{{ $user->city }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">Country </label>
                                            <select name="country" class="form-control">
                                                <option value="{{$user->country}}"
                                                        selected>{{ $user->country }}</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia, Plurinational State of bolivia">Bolivia,
                                                    Plurinational State of bolivia
                                                </option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
                                                    Territory
                                                </option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic
                                                </option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of the Congo">Congo, The
                                                    Democratic Republic of the Congo
                                                </option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands
                                                    (Malvinas)
                                                </option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern
                                                    Territories
                                                </option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and
                                                    Mcdonald Islands
                                                </option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                                    State)
                                                </option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of Persian Gulf">Iran, Islamic
                                                    Republic of Persian Gulf
                                                </option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of Korea">Korea,
                                                    Democratic People's Republic of Korea
                                                </option>
                                                <option value="Korea, Republic of South Korea">Korea, Republic of South
                                                    Korea
                                                </option>
                                                <option value="Kosovo">Kosovo</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of Micronesia">Micronesia,
                                                    Federated States of Micronesia
                                                </option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands
                                                </option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                    Occupied
                                                </option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                <option value="Saint Helena, Ascension and Tristan Da Cunha">Saint
                                                    Helena, Ascension and Tristan Da Cunha
                                                </option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Martin">Saint Martin</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                                </option>
                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                                    Grenadines
                                                </option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Sudan">South Sudan</option>
                                                <option value="South Georgia and the South Sandwich Islands">South
                                                    Georgia and the South Sandwich Islands
                                                </option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of Tanzania">Tanzania, United
                                                    Republic of Tanzania
                                                </option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-Leste">Timor-Leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands
                                                </option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela, Bolivarian Republic of Venezuela">Venezuela,
                                                    Bolivarian Republic of Venezuela
                                                </option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xl-4 col-md-6  col-sm-3 col-12">
                                        <label class="form-control-label font-weight-bold">Balance </label>
                                        <input type="text" class="form-control" name="balance" id="balance"
                                               value="{{ $user->balance->balance ?? 0 }}">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xl-4 col-md-6  col-sm-3 col-12">
                                        <label class="form-control-label font-weight-bold">Status </label>
                                        <input type="checkbox" name="status" id="status" class="cm-toggle"
                                                {{ ($user->status == null ? 'checked' : '') }}>

                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn--primary btn-block btn-lg">Save
                                                Changes
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-50">
                        <div class="card-body">
                            <form action="{{ route('send-single-email') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="font-weight-bold">Subject <span
                                                        class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Email subject"
                                                   name="subject" required="">
                                            <input type="hidden" name="useremail" value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="font-weight-bold">Message <span
                                                        class="text-danger">*</span></label>

                                            <textarea name="message" rows="10" class="form-control nicEdit"
                                                      placeholder="Your message"
                                            ></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 text-center">
                                            <button type="submit" class="btn btn-block btn--primary mr-2">Send Email
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>

            <div class="card mt-50">
                <div class="card-body">
                    <h5>Referrals</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-top-warning  border-bottom-warning">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-person-square text-danger"></i> Left
                                        Members</h5>
                                    <table id="datatable" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($leftMembers)
                                            @foreach($leftMembers as $leftMember)
                                                @if($leftMember->user)

                                                    <tr data-toggle="modal" data-target="#detailsModal">
                                                        <td data-title="Id">{{ $loop->iteration }}</td>
                                                        <td data-title="Username">
                                                            <a href="{{ route('view-user', $leftMember->user_id) }}">
                                                                {{ $leftMember->user->name ?? '' }}
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endif
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="10" class="text-center text-danger">NO DATA</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-top-warning  border-bottom-warning">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-person-square text-success"></i>
                                        Right Members
                                    </h5>
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($rightMembers)
                                            @foreach($rightMembers as $rightMember)
                                                @if($rightMember->user)
                                                    <tr data-toggle="modal" data-target="#detailsModal">
                                                        <td data-title="Id">{{ $loop->iteration }}</td>
                                                        <td data-title="Username">
                                                            <a href="{{ route('view-user', $rightMember->user_id) }}">
                                                                {{ $rightMember->user->name ?? '' }}
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endif
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="10" class="text-center text-danger">NO DATA</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="addSubModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add / Subtract Balance</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="https://script.viserlab.com/bisurv/admin/user/add-sub-balance/101" method="POST">
                            <input type="hidden" name="_token" value="lVh4o4q51UoJHK04WhLezrKfGE5LQ8a78jvbzOun">
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="toggle btn btn--success" data-toggle="toggle"
                                             style="width: 100%; height: 44px;"><input type="checkbox" data-width="100%"
                                                                                       data-height="44px"
                                                                                       data-onstyle="-success"
                                                                                       data-offstyle="-danger"
                                                                                       data-toggle="toggle"
                                                                                       data-on="Add Balance"
                                                                                       data-off="Subtract Balance"
                                                                                       name="act" checked="">
                                            <div class="toggle-group"><label class="btn btn--success toggle-on">Add
                                                    Balance</label><label class="btn btn--danger active toggle-off">Subtract
                                                    Balance</label><span class="toggle-handle btn btn-default"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label>Amount<span class="text-danger">*</span></label>
                                        <div class="input-group has_append">
                                            <input type="text" name="amount" class="form-control"
                                                   placeholder="Please provide positive amount">
                                            <div class="input-group-append">
                                                <div class="input-group-text">USD</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn--dark" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn--success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div><!-- bodywrapper__inner end -->
    </div>
    <script>
        //        $('#status').change(function(){
        //            if($(this).is(':checked')){
        //                $(this).val("")
        //            } else{
        //                $(this).val(1)
        //            }
        //        })
    </script>
    <script>
        @if(Session::has('success'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.success("{{ session('success') }}");
        @endif

                @if(Session::has('error'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.error("{{ session('error') }}");
        @endif

                @if(Session::has('info'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.info("{{ session('info') }}");
        @endif

                @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.warning("{{ session('warning') }}");
        @endif

    </script>

@endsection