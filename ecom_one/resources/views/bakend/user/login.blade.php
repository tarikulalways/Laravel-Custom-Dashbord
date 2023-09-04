@include('bakend.inc.header')
<div class="container">
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Register -->
                    <div class="card mt-5">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center mb-3">
                                <h2 class="text-bold card-header">Wellcom To Login</h2>
                            </div>

                            <form id="formAuthentication" class="mb-3" action="{{ route('userloginPost') }}"
                                method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email or username" autofocus="">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="············" aria-describedby="password">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                                    @if (session()->has('error'))
                                        <p class="text-danger text-center mt-2">{{ session('error') }}</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Register -->
                </div>
            </div>
        </div>
    </div>

</div>
@include('bakend.inc.footerscript')
