var postId = 0;
var postBodyElement = null;

$('.post .interaction .edit').on('click', function(event) {
    event.preventDefault();

    var postBody = event.target.parentNode.parentNode.childNodes[0].innerText;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function() {
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: { body: $('#post-body').val(), postId: postId, _token: token}
    })
    .done(function (msg) {
        //$(postBodyElement).text(msg['new_body']);
        $('#edit-modal').modal('hide');
        location.reload(true);
    });

});

$('.like').on('click', function(event) {
    event.preventDefault();
    var isUser = $('#test').val() != null ? true : false
    var isLike = event.target.previousElementSibling == null ? true : false;
    postId = event.target.parentNode.parentNode.dataset['postid'];

    $.ajax({
        method: 'POST',
        url: urlLike,
        data: { isLike: isLike, postId: postId, _token: token }
    })
    .done(function (msg){

        event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Liked' : 'Like' : event.target.innerText == 'Dislike' ? 'Disliked' : 'Dislike';
        //console.log(msg.message);

        if (isLike) {
            event.target.nextElementSibling.innerText = 'Dislike';
        } else  {
            event.target.previousElementSibling.innerText = 'Like';
        }
        if (isUser) {
            event.target.parentNode.childNodes[9].innerText = msg.like;
        } else {
            event.target.parentNode.childnodes[5].innerText = msg.like;
        }

    });
});
