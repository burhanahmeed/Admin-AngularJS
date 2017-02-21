<!-- <div class="container"> -->
    <div class="row">
    <div class="link-table"><h3>Links Management Page</h3></div>
            <div class="col-md-6 link-table">
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
                    <table class="table table-hover" id="dev-table" ng-controller="ChartCtrl">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Short Link</th>
                                <th>URL</th>
                                <th>Date Created</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="l in links">
                                <td>{{l.id}}</td>
                                <td>{{l.short_url}}</td>
                                <td>{{l.long_url}}</td>
                                <td>{{l.url_timestamp}}</td>
                                <td class="text-center"><a class="btn btn-info btn-xs" href="" ><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- </div> -->