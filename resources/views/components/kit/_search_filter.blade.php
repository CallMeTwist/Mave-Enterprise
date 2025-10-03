<input type="text" class="form-control input-bottom" id="search" placeholder="{{ $placeholder }}">

<x-slot name="js">
    <script>
        $('.datalist .card').each(function(){
            $(this).attr('data-search-term', $(this).text().toLowerCase());
        });
        $('#search').on('keyup', function(){
            var searchTerm = $(this).val().toLowerCase();
            $('.datalist .card').each(function(){
                if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    </script>
</x-slot>
