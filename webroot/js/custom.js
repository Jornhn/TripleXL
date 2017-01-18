/**
 * Created by jornholterman on 11-01-17.
 */

function isEmpty( el ){
      return !$.trim(el.html())
  }
  if (isEmpty($('#cv-title'))) {
      $('.vacature-button-closed').hide();
      $('.vacature-button-open').hide();
}

//tijdelijk omdat css niet pakt
$('.vacature-button-closed').hide();

$('.vacature-button-open').click(function(){
    $('.vacature-table').show();
    $('.vacature-button-open').hide();
    $('.vacature-button-closed').show();

    $('html, body').animate({ scrollTop: $(document).height() },'slow');
});

$('.vacature-button-closed').click(function(){
    $('.vacature-table').hide();
    $('.vacature-button-closed').hide();
    $('.vacature-button-open').show();
});

$('#category-id').on('change', function() {
    var categoryId = $(this).val();
    var url = $(this).attr('data-url');

    $.post(url, { categoryId: categoryId }, function(result) {
        var html = [];
        for (var i = 0; i < result.result.length; i++) {
            html.push('<option value="'+result.result[i].id+'">'+result.result[i].title+'</option>');
        }

        $('#competence-container').removeClass('hidden');
        $('#categories-competences-ids').html(html.join(''));
    });
});

//Custom Alert

function confirmation(id){
        swal({
              title: 'Weet u het zeker dat u wilt verwijderen?',
              text: "Het kan niet terug worden gezet",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ja, Verwijder!'
            }).then(function () {
              window.location.href = window.location.href + "/delete/" + id;
        })
}

