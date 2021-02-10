	<script src="{{ asset('app-assets/js/vendors.min.js') }}"></script>

	<script src="{{ asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/data-tables/js/dataTables.select.min.js') }}"></script>

    <script src="{{ asset('app-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('app-assets/js/search.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom/custom-script.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script> 
    <script src="{{ asset('app-assets/js/scripts/data-tables.js') }}"></script> --}}
    <script src="{{ asset('app-assets/js/scripts/ui-alerts.js') }}"></script>
	<script src="{{ asset('app-assets/js/toastr/toastr.min.js') }}"></script>
    <script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>
    <script>
	    $(function () {
	        $('#jqueryTable').DataTable({
	            'searching' 	: true,
	            'pagingType'	: 'simple_numbers',
	            'ordering'  	: true,
	            'stateSave'		: true,
	            'lengthMenu'	: [
				  [10, 25, 50, -1],
				  [10, 25, 50, "All"]
				]
	            // "scrollX": true
	        });


			// $('#page-length-option').DataTable({
			// 	// "responsive": true,
			// 	// "lengthMenu": [
			// 	//   [10, 25, 50, -1],
			// 	//   [10, 25, 50, "All"]
			// 	// ]
			// 	'scrollX':true
			// });
	    });
	</script> 
    @yield('scripts')