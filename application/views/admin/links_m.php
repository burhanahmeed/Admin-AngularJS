<!-- <div class="container"> -->
    <div class="row">
    <div class="link-table" style="margin-left: 30px;"><h3>Links Management Page</h3></div>
            <div class="col-md-12 link-table">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Links</h3>
                        <div class="pull-right">
                            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                <i class="glyphicon glyphicon-filter"></i>
                            </span>
                        </div>
                    </div>
                    <div class="panel-body">
                   
                    </div>
                    <table class="table table-hover" id="dev-table">
                        <thead>
                         <form class="form-inline" >
                            <div class="form-group" style="margin: 5px 10px 5px 10px;">
                                <label >Search</label>
                                <input type="text" ng-model="search" class="form-control" placeholder="Search">
                            </div>
                        </form>
                        <!-- pager -->
                        <div class="center">
                            <ul class="pagination" style="margin: 0 0 0 0;">
                            <dir-pagination-controls
                               max-size="10"
                               direction-links="true"
                               boundary-links="true" >
                            </dir-pagination-controls>
                            </ul>
                        </div>
                        <form method="post" name="ckhbox">
                         <button type="submit" ng-disabled="ckhbox.$invalid" ng-click="delMultiple()">Delete Selected</button>
                            <tr>
                                <th><input type="checkbox" id="checkBoxAll"></th>
                                <th><a ng-click="sortBy('id')">ID</a><span class="sortorder" ng-show="propertyName === 'id'" ng-class="{reverse: reverse}"></span></th>
                                <th><a ng-click="sortBy('short_url')">Short Link</a><span class="sortorder" ng-show="propertyName === 'short_url'" ng-class="{reverse: reverse}"></span></th>
                                <th><a ng-click="sortBy('long_url')">URL</a><span class="sortorder" ng-show="propertyName === 'long_url'" ng-class="{reverse: reverse}"></span></th>
                                <th><a ng-click="sortBy('url_timestamp')">Date Created</a><span class="sortorder" ng-show="propertyName === 'url_timestamp'" ng-class="{reverse: reverse}"></span></th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr dir-paginate="link in links| orderBy:propertyName:reverse | filter:search | itemsPerPage:50">
                                <td><input type="checkbox" class="checkBoxId" value="{{link.id}}" ng-model="link.selected"></td>
                                <td>{{link.id}}</td>
                                <td><a target="_blank" href="http://kusia.ga/{{link.short_url}}">{{link.short_url}}</a></td>
                                <td title="{{link.long_url}}">{{link.long_url | limitTo:70}}{{link.long_url.length > 70 ? ' . . . .':''}}</td>
                                <td>{{link.url_timestamp}}</td>
                                <td class="text-center">
                                <a class="btn btn-info btn-xs" data-target="#edit-data" data-toggle="modal" ng-click="editLink(link.id)"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                                <a href="#" class="btn btn-danger btn-xs" ng-click="delete(link.id)"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
                            </tr>
                        </tbody>
                        </form>
                    </table>
                    <!-- pager -->
                    <div class="center">
                         <ul class="pagination">
                        <dir-pagination-controls
                           max-size="10"
                           direction-links="true"
                           boundary-links="true" >
                        </dir-pagination-controls>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->

    <!-- Edit Modal -->

    <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <form method="POST" name="editItem" role="form" ng-submit="editsubmit(editc.id)">
                  <!--   <input ng-model="editc.id" type="hidden" placeholder="Name" name="inputId" class="form-control" /> -->
                    <!-- <input ng-model="editc.long_url" type="hidden" placeholder="Name" name="inputUrl" class="form-control" /> -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Link</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input ng-model="editc.short_url"  type="text" placeholder="Short URL" class="form-control" required />
                                </div>
                                <div>
                                <label>Long URL</label><br>
                                    <p>{{editc.long_url}}</p>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" ng-disabled="editItem.$invalid" class="btn btn-primary create-crud">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="notif"></div>