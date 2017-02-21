<!-- <div class="container"> -->
    <div class="row">
    <div class="link-table" style="margin-left: 30px;"><h3>Links Statistics</h3></div>
            <div class="col-md-6 link-table">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Links Viewer</h3>
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
                            <tr>
                                <th><a ng-click="sortBy('id')">ID</a><span class="sortorder" ng-show="propertyName === 'id'" ng-class="{reverse: reverse}"></span></th>
                                <th><a ng-click="sortBy('short_url')">Short Link</a><span class="sortorder" ng-show="propertyName === 'short_url'" ng-class="{reverse: reverse}"></span></th>
                                <th><a ng-click="sortBy('url_views')">Views</a><span class="sortorder" ng-show="propertyName === 'url_views'" ng-class="{reverse: reverse}"></span></th>
                                <th><a ng-click="sortBy('url_timestamp')">Date Created</a><span class="sortorder" ng-show="propertyName === 'url_timestamp'" ng-class="{reverse: reverse}"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr dir-paginate="link in links| orderBy:propertyName:reverse | filter:search | itemsPerPage:30">
                                <td>{{link.id}}</td>
                                <td><a target="_blank" href="http://kusia.ga/{{link.short_url}}">{{link.short_url}}</a></td>
                                <td>{{link.url_views}}</td>
                                <td>{{link.url_timestamp}}</td>
                            </tr>
                        </tbody>
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
        
            <div class="row">
                <div class="col-md-6 chart-stat">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Line Chart</div>
                        <div class="panel-body">
                            <div class="canvas-wrapper">
                                <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->

        </div> <!-- row -->