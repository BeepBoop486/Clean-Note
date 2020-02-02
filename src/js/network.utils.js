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

    if(action == 1) {
        $.get("/api/likes/GetLikes.php", {post_id: post_id}).done((data) => {
            for(var i = 0; i < data; i++) {
                AddALike(post_id)
            }
        })
        $.get("/api/comments/GetComments.php", {post_id: post_id}).done((data) => {
            SetCommentsVal(post_id, data);
        })
    }
}

function SetCommentsVal(pid, val) {
    var post_id = pid, val = val

    if(document.readyState === "complete") {
        var dom = document.getElementById("comments_val_"+post_id)
        dom.innerHTML = val
    }
}

function DeleteLike(post_id, user_id) {
    var post_id = post_id, user_id = user_id;

    $.post("/api/likes/DeleteLike.php", {post_id: post_id, liker_id: user_id}).done((data) => {
        if(data == 1) {
            DeleteALike(post_id)
        }
    })
}

function Like(post_id, user_id) {
    var post_id = post_id, user_id = user_id;

    $.post("/api/likes/Like.php", {post_id: post_id, liker_id: user_id}).done((data) => {
        if(data == 1) {
            var dom = document.getElementById("like_button_"+post_id);
            dom.style.color = "aqua";
            AddALike(post_id)
        }
    })
}

function AddALike(post_id) {
    var post_id = post_id

    var dom = document.getElementById("likes_value_"+post_id)
    var likes = parseInt(dom.innerHTML, 10)
    dom.innerHTML = likes + 1
}

function DeleteALike(post_id) {
    var post_id = post_id

    var dom = document.getElementById("likes_value_"+post_id)
    dom.innerHTML = dom.innerHTML - 1
    dom.style.color = "#7f7f7f"

}

function Comment(post_id) {
    var post_id = post_id

    var input_elm = document.getElementById("comment_box_"+post_id);
    var content = input_elm.value

    if(content != null) {
        $.post("/api/comments/Comment.php", {post_id: post_id, comment_cnt: content}).done((data) => {
            input_elm.value = "";
            CheckIfILiked(post_id, 1)
        })
    }
}

function HaveIFollowed(followed_id, action) {
    var followed_id = followed_id
    var action = action

    $.post("/api/followers/HaveIFollowed.php", {followed_id: followed_id}).done((data) => {

        if(action == 1) {
            if (data == 0) {
                Follow(followed_id)
            } else if (data == 1) {
                UnFollow(followed_id)
            }
        } 
        if(action == 0) {

            if(document.readyState === "complete") {
                var elm = document.getElementById("follow_btn_"+followed_id);
                if (data == 0) {
                    elm.innerHTML = "Follow";
                } else if (data == 1) {
                    elm.innerHTML = "Unfollow";
                }
            }

        }

    })
}

function UnFollow(followed_id) {
    var followed_id = followed_id

    $.post("/api/followers/UnFollow.php", {followed_id: followed_id}).done((data) => {
        HaveIFollowed(followed_id, 0)
    })
}

function Follow(followed_id) {
    var followed_id = followed_id

    $.post("/api/followers/Follow.php", {followed_id: followed_id}).done((data) => {
        HaveIFollowed(followed_id, 0)
    })
}

function CheckIfIReCleaned/*xd*/(post_id, user_id) {
    var cleaned = false;

    return cleaned;
}

function ReClean(post_id, user_id) {

}