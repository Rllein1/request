<!-------- REQUES FORM MODAL -------->
@if(Auth::user()->dept->department!='ICTC')
<div class="modal fade" id="ICTC" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ICTC Request Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-------- FORM LOGO -------->
        <div class="formheader">
          <img src="{{asset('img/logo.svg')}}">
        </div>

        <div class="formcontent">
    <form action="{{route('storeform.store')}}" method="post">
      @csrf
          <div class="">
            <div class="row align-items-center">
                <!--------- INPUT ----------->
                <div class="col-md-6">
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Date Needed</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="dateneeded" required>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Department</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="department" value="{{Auth::user()->dept->department}}" disabled>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Request by:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="requestby" required>
                    </div>
                  </div>
                  
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Approved by:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="approvedby" value="{{Auth::user()->dept->head->username}}" disabled>
                    </div>
                  </div>
                </div>
                  <!------- CHECKBOX -------->
                <div class="col-md-6">
                  <h3>Type of Service</h3>
                  <div class="form-check m-3">
                    <input class="form-check-input" type="checkbox" value="network" name="services[]" id="flexCheckDefault">
                    <label class="form-check-label font-weight-bold" for="flexCheckDefault">
                      NETWORK
                    </label>
                  </div>

                  <div class="form-check m-3">
                    <input class="form-check-input" type="checkbox" value="software" name="services[]" id="flexCheckChecked">
                    <label class="form-check-label font-weight-bold" for="flexCheckChecked">
                      SOFTWARE
                    </label>
                  </div>

                  <div class="form-check m-3">
                    <input class="form-check-input" type="checkbox" value="hardware" name="services[]" id="flexCheckDefault">
                    <label class="form-check-label font-weight-bold" for="flexCheckDefault">
                      HARDWARE
                    </label>
                  </div>

                  <div class="form-check m-3">
                    <input class="form-check-input" type="checkbox" value="other" name="services[]" id="flexCheckChecked">
                    <label class="form-check-label font-weight-bold" for="flexCheckChecked">
                      Other
                    </label>
                  </div>
                </div>

            </div>
          </div>
            <!------- DESCRIPTION -------->
          <div class="form-floating formdescription">
            <textarea class="form-control" placeholder="Leave a comment here" name="description" id="floatingTextarea2" style="height: 150px" required></textarea>
            <label for="floatingTextarea2">Detailed Description: <span class="font-weight-normal"> Please provide detailed information about your request(i.e. problem description).</span></label>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="sumbit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endif