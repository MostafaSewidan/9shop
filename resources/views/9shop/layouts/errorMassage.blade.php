@if(session()->get('fail'))
    <div class="error_cont">
        <center style="margin-left:-8px">
            <div class="error modal-dialog " role="alert" >

                <img class="error_icon" src="{{asset('9shop/img/icons/error-icon-png-7.jpg')}}" style="    width: 149px;
padding-bottom: 1pc;" />

                <p class="error_p">
                    this is a test errors in 9shop
                </p>
            </div>
        </center>
    </div>
@endif




@if(session()->get('success'))
    <div class="error_cont">
        <center style="margin-left:-8px">
            <div class="error modal-dialog " role="alert" >

                <img class="error_icon" src="{{asset('9shop/img/icons/604a0cadf94914c7ee6c6e552e9b4487-curved-check-mark-circle-icon-by-vexels.png')}}" style="    width: 149px;
    padding-bottom: 1pc;" />
                <p class="error_p">
                    this is a test errors in 9shop
                </p>
            </div>
        </center>
    </div>
@endif

