//This is made thru JavaScript
//Because I'll use Ajax

function CheckIfILiked(post_id, user_id) {

    var post_id = post_id, user_id = user_id;

    $.get("/api/likes/CheckIfILiked.php", {post_id: post_id, liker_id: user_id}).done((data) => {
        if(data == 0) {
            Like(post_id, user_id)
        } else {
            DeleteLike(post_id, user_id)
        }
    })
}

function DeleteLike(post_id, user_id) {
}

function Like(post_id, user_id) {
    var post_id = post_id, user_id = user_id;

    $.post("/api/likes/Like.php", {post_id: post_id, liker_id: user_id}).done((data) => {
        alert(data)
    })
}

function CheckIfIReCleaned/*xd*/(post_id, user_id) {
    var cleaned = false;

    return cleaned;
}

function ReClean(post_id, user_id) {

}

function Comment(post_id, user_id) {

}