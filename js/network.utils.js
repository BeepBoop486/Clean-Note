//This is made thru JavaScript
//Because I'll use Ajax

function CheckIfILiked(post_id, user_id, action) {

    var post_id = post_id, user_id = user_id;

    $.get("/api/likes/CheckIfILiked.php", {post_id: post_id, liker_id: user_id}).done((data) => {
        if(action == 0) {    
            if(data == 0) {
                Like(post_id, user_id)
            } else {
                DeleteLike(post_id, user_id)
            }
        }

        if(action == 1 && data == 1) {
            let stateCheck = setInterval(() => {
                if(document.readyState === 'complete') {
                    var dom = document.getElementById("like_button_"+post_id);
                    dom.style.color = "aqua";
                    clearInterval(stateCheck);
                }
            })
        }
    })
}

function DeleteLike(post_id, user_id) {
    var post_id = post_id, user_id = user_id;
}

function Like(post_id, user_id) {
    var post_id = post_id, user_id = user_id;

    $.post("/api/likes/Like.php", {post_id: post_id, liker_id: user_id}).done((data) => {
        if(data == 1) {
            var dom = document.getElementById("like_button_"+post_id);
            dom.style.color = "aqua";
            var dom = document.getElementById("likes_value_"+post_id)
            dom.innerHTML = dom.innerHTML + 1
        }
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