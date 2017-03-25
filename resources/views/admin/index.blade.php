@extends('admin.home')
@section('main')
	<div class="w3-content w3-padding" style="max-width:1564px; ">

			  <!-- Danh mục -->
				<div class="w3-container w3-padding-32" id="projects">
				    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Thống kê chung </h3>
				</div>
				<div id="piechart1" class="col-lg-4" style=" height: 300px;"></div>
				<div id="piechart2" class="col-lg-4" style=" height: 300px;"></div>
				<div id="piechart3" class="col-lg-4" style=" height: 300px;"></div>

			</div>
			<div class="w3-content w3-padding" style="max-width:1564px">

				<div id="piechart4" class="col-lg-6" style=" height: 300px;"></div>
				<div id="piechart5" class="col-lg-6" style=" height: 300px;"></div>
				
				
			</div>
	</div>

@endsection
@section('script')
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				 <script type="text/javascript">
			      google.charts.load('current', {'packages':['corechart']});
			      google.charts.setOnLoadCallback(drawChart);
			      function drawChart() {
			        var data = google.visualization.arrayToDataTable([
			          ['Task', 'Hours per Day'],
			          ['TS',     39.8],
			          ['ThS',      25.2],
			          ['KS',  14.3],
			          ['CN',    10],
			           ['Khác', 20.7]
			        ]);
			        var options = {
			          title: 'Nhà khoa học'
			        };
			        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
			        chart.draw(data, options);
			      }
			    </script>
			    <script type="text/javascript">
			      google.charts.load('current', {'packages':['corechart']});
			      google.charts.setOnLoadCallback(drawChart);
			      function drawChart() {
			        var data = google.visualization.arrayToDataTable([
			          ['Task', 'Hours per Day'],
			          ['KH&CN',     31.9],
			          ['KHXH ',  30.2],
			          ['KHNN-TT', 13.3],
			          ['KHNN',    10.7],
			          ['Khác',  13.9]
			        ]);
			        var options = {
			          title: 'Đề tài -dự án'
			        };
			        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
			        chart.draw(data, options);
			      }
			    </script>
			    <script type="text/javascript">
				    google.charts.load('current', {'packages':['corechart']});
				    google.charts.setOnLoadCallback(drawChart);
					  	function drawChart() {
				      		var data = google.visualization.arrayToDataTable([
					          ['Task', 'Hours per Day'],
					          ['CNCTM-TĐH',     30.2],
					          ['CNSH',  29.2],
					          ['CNTT&TT', 17.7],
					          ['CNVLM',    14.2],
					          ['CNMT',  8.3]
					        ]);
					        var options = {
					          title: 'Sản phẩm'
					        };
				        	var chart = new google.visualization.PieChart(document.getElementById('piechart3')); chart.draw(data, options);
				      }
				  </script>
			    <script type="text/javascript">
			      google.charts.load('current', {'packages':['corechart']});
			      google.charts.setOnLoadCallback(drawChart);
			      function drawChart() {
			        var data = google.visualization.arrayToDataTable([
			          ['Task', 'Hours per Day'],
			          ['Công nghệ khác (Sáng chế)',     39.4],
			          ['Công nghệ khác (Giải pháp hữu ích) ',  20.3],
			          ['Công nghệ chế tạo máy - tự động hóa',  15.2],
			          ['Công nghệ sinh học', 12.6],
			          ['Công nghệ vật liệu mới ',    12.5]
			        ]);
			        var options = {
			          title: 'Phát minh'
			        };
			        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
			        chart.draw(data, options);
			      }
			    </script>
			    <script type="text/javascript">
			      google.charts.load('current', {'packages':['corechart']});
			      google.charts.setOnLoadCallback(drawChart);
			      function drawChart() {
			        var data = google.visualization.arrayToDataTable([
			          ['Task', 'Hours per Day'],
			          ['Công nghệ khác',     94.6],
			          ['Công nghệ vật liệu mới ',  2],
			          ['Công nghệ sinh học',  1.8],
			          ['Công nghệ chế tạo máy - tự động hóa', 1.3],
			          ['Công nghệ môi trường ',    0.4]
			        ]);
			        var options = {
			          title: 'Doanh nghiệp'
			        };
			        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
			        chart.draw(data, options);
			      }
			    </script>
@endsection