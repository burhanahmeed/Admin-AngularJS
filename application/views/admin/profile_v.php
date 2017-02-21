<div class="row">
	<div class="profile-title">
		<h3>{{profile.name}} Profile</h3>
	</div>

	<div class="profile-content row" style="">
		 <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Full Name</td>
                        <td>{{profile.name}}</td>
                      </tr>
                      <tr>
                        <td>Email </td>
                        <td>{{profile.email}}</td>
                      </tr>
                       <tr>
                        <td>Role</td>
                        <td>{{profile.role}}</td>
                      </tr>  
                      <tr>
                        <td>Date Created</td>
                        <td>{{profile.created}}</td>
                      </tr>                     
                    </tbody>
                  </table>
        <button data-target="#edit-data" data-toggle="modal">Edit</button>
        <button data-target="#edit-pass" data-toggle="modal">Change Password</button>
	</div>
</div>

<!-- MODAL -->
 <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <form method="POST" name="editItem" role="form" ng-submit="submitEditProfile(profile.uid)">
                  <!--   <input ng-model="editc.id" type="hidden" placeholder="Name" name="inputId" class="form-control" /> -->
                    <!-- <input ng-model="editc.long_url" type="hidden" placeholder="Name" name="inputUrl" class="form-control" /> -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                <label>Full Name</label>
                                    <input ng-model="profile.name"  type="text" placeholder="Full Name" class="form-control" required />
                                    <label>Email (can't be changed)</label>
                                    <input type="text" value="{{profile.email}}" disabled="" class="form-control" >
                                    <label>Role (can't be changed)</label>
                                    <input type="text" value="{{profile.role}}" disabled="" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" ng-disabled="editItem.$invalid" class="btn btn-primary create-crud">Finish & Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL -->
 <div class="modal fade" id="edit-pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <form method="POST" name="chgpass" role="form" ng-submit="changePass(profile.uid)">
                  <!--   <input ng-model="editc.id" type="hidden" placeholder="Name" name="inputId" class="form-control" /> -->
                    <!-- <input ng-model="editc.long_url" type="hidden" placeholder="Name" name="inputUrl" class="form-control" /> -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Password</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" ng-model="password" class="form-control" name="password" required>
                                    <label>Confirm Password</label>
                                    <input id="pass" type="password" ng-model="cpassword" name="cpassword" class="form-control" required autofocus="true">
                                </div>
                            </div>
                        </div>
                        <button id="cpass" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" ng-disabled="chgpass.$invalid" class="btn btn-primary create-crud">Change</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="notif"></div>