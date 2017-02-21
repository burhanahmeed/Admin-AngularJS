<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{show_all_count}}</div>
							<div class="text-muted">Total links</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">24</div>
							<div class="text-muted">New Users</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{totalClicked}}</div>
							<div class="text-muted">Links Click</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
		<h4 style="margin-left: 15px">Top Six Links Clicked</h4>
			<div class="col-md-6">
				<table class="table table-hover">
				    <thead>
				      <tr>
				      	<th>#</th>
				        <th>ID</th>
				        <th>Short URL</th>
				        <th>Clicked</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr ng-repeat="v in topView">
				      	<td>{{$index +1}}</td>
				        <td>{{v.id}}</td>
				        <td><a href="http://kusia.ga/{{v.short_url}}">{{v.short_url}}</a></td>
				        <td>{{v.url_views}}</td>
				      </tr>
				    </tbody>
				  </table>
			</div>
		</div>