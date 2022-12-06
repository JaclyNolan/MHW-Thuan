<!--header-->
@INCLUDE('font_end.layout.1Head')
<!--headermenu-->
@INCLUDE('font_end.layout.2Headermenu_area')
<!--banner-->
@INCLUDE('font_end.layout.3Banner_area')
<!--feature-->

<!--cart-->
@yield('content')
{{-- @INCLUDE('font_end.tracking.tracking) --}}

<!--footer -->
@INCLUDE('font_end.layout.10Footer_area')

<!--js -->
@INCLUDE('font_end.layout.11js')

</body>
</html>