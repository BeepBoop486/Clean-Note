//This is made thru JavaScript
//Because I'll use Ajax

function CheckIfILiked(post_id, user_id) {
    var liked = false;

    $.get("/api/likes/CheckIfILiked.php", {post_id: post_id, liker_id: user_id}).done((data) => {
        alert(data)
    })

    return liked;
}

function Like(post_id, user_id) {
    if(!CheckIfILiked(post_id, user_id)) {
        
    }
}

function CheckIfIReCleaned/*xd*/(post_id, user_id) {
    var cleaned = false;

    return cleaned;
}

function ReClean(post_id, user_id) {

}

function Comment(post_id, user_id) {

}