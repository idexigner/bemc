@extends('frontend.layout.main')

@push('title') Profile @endpush


@push('css-link')
<!-- Select2 -->
<link rel="stylesheet" href="{{ url('/')}}/admin/plugins/select2/css/select2.min.css">
@endpush
@section('main-section')



<style>
    div#my_left_r {
        display: flex;
    }

    div#my_left_r .in-page-advert {
        width: 100%;
        margin-left: 0px !important;
    }

    div#my_left_r .in-page-advert a.advert.no-outline {
        text-align: left !important;
        margin-left: 0px !important;
        display: block;
        padding-left: 0px !important;
    }

    div#my_left_r .in-page-advert a.advert.no-outline img {
        object-fit: contain;
        margin: 0 !important;
        padding: 0 !important;
    }

    div#my_left_r .col-md-6.col-12 {
        display: flex;
        margin-left: 0px !important;
        padding-left: 0px !important;
    }

    .select2 {
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .select2:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .select2-selection__rendered {
        line-height: 1.5;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        border: none;
        background: transparent;
        padding-top: inherit;
    }

    .select2-container--default .select2-selection--single {
        border: none;
    }

    .select2-selection__arrow {
        display: none !important;
    }
</style>



<div class="banner title-banner d-md-flex d-none">
    <h2>Profile</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
{{-- <div class="container">
    <div class="row" id="my_left_r">
        <div class="col-md-6 col-12">
            <div class="in-page-advert doctor-advert-top-left"></div>
            <div class="in-page-advert doctor-advert-top-right"></div>
        </div>
        <div class="col-md-6 col-12">
            <img src="https://dev.mimsbangladesh.com/application/views/images/logo/Gv2.png" alt="" width="80%px" style="
    padding: 30px;
    background: white;
    margin-top: 30px;
">
        </div>
    </div>
</div> --}}

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="content-section main">
                <form class="brand-details" id="userProfileForm">
                    @csrf
                    <div class="container" style="padding-bottom: 20px">
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Title</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <div class="theme-select">
                                    <input class="form-control theme-input" type="text" size="50" name="title"
                                    id="UserProfileOtherTitle" maxlength="20" value="{{ auth()->user()->title }}">
                                </div>
                            </div>     
                             <div class="col-md-2 col-12 address-search-col"></div>                       
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">First Name<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="firstname" id="UserProfileFirstName"
                                    placeholder="First Name" required="required" value="{{ auth()->user()->firstname }}">
                                <span class="error profile-first-name-error" style="display: none">Please enter your first
                                    name.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Last Name<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="lastname" id="UserProfileLastName"
                                    placeholder="Last Name" required="required" value="{{ auth()->user()->lastname }}">
                                <span class="error profile-last-name-error" style="display: none">Please enter your last
                                    name.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">User Name<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="username" id="UserProfileUserName"
                                    placeholder="User Name" required="required" value="{{ auth()->user()->username }}">
                                <span class="error profile-user-name-error" style="display: none">Please enter your user
                                    name.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Email ID<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="email" id="UserProfileEmailID"
                                    placeholder="Email ID" required="required" value="{{ auth()->user()->email }}">
                                <span class="error invalid-email-id" style="display: none">Please enter a valid email
                                    address.</span>
                                <span class="error profile-email-error" style="display: none">Please enter your email
                                    address.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Profession</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="profession" id="UserProfileProfession"
                                    placeholder="Profession" value="{{ auth()->user()->profession }}">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Organisation</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="organization" id="UserProfileOrganisation"
                                    placeholder="Organisation" value="{{ auth()->user()->organization }}">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Country</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input"  id="UserProfileOrganisation"
                                    placeholder="Organisation" value="{{ auth()->user()->country->country_name }}" readonly>
                            </div>

                            
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">State</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input"  id="UserProfileOrganisation"
                                    placeholder="Organisation" value="{{ auth()->user()->state->state_name }}" readonly>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">City</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input"  id="UserProfileOrganisation"
                                    placeholder="Organisation" value="{{ auth()->user()->city->city_name }}" readonly>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Zip Code</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="zipcode" id="UserProfileZipCode"
                                    placeholder="ZipCode" value="{{ auth()->user()->zipcode }}">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Address</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="address" id="UserProfileZipCode"
                                placeholder="Address" value="{{ auth()->user()->address }}">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Telephone/Mobile</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="telephone" id="UserProfileTelephone"
                                    placeholder="Telephone" value="{{ auth()->user()->telephone }}">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Fax</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="fax" id="UserProfileFax" placeholder="Fax"  value="{{ auth()->user()->fax }}">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-5 col-12 address-search-col"></div>
                            <div class="col-md-2 col-12 address-search-col">
                                <button type="button" class="btn theme-btn" style="width: 100%;">Update</button>
                            </div>
                            <div class="col-md-5 col-12 address-search-col"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      
        
    </div>
</div>

<script>
    // number count for stats, using jQuery animate

    $('.counting').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');

        $({
            countNum: $this.text()
        }).animate({
                countNum: countTo
            },

            {

                duration: 3000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                    //alert('finished');
                }

            });


    });
</script>



@endsection


@include('frontend.component.script.frontend-sidebar-script')
@push('js-link')

<script>

        $('#userProfileForm').submit(function(e) {
                e.preventDefault();
             
                $.ajax({
                    url: "{{ url('/') }}/profile_update", 
                    type: 'POST',             
                    data: new FormData(this),//$(this).serialize(), // // new FormData($("#create-post-form")[0]), //
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.reload();
                        // alert(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.group("Error Block");
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        console.groupEnd();   

                        if(xhr.responseJSON.message){

                            Toast.fire({
                                icon: 'error',
                                title: xhr.responseJSON.message, //"Generic record deleted successfully",
                                timer: 3000,
                            });

                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong', //"Generic record deleted successfully",
                                timer: 3000,
                            });
                        }
                                        
                    }
                });
            });
</script>

@endpush