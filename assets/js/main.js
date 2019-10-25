var samplePostsBtn = document.getElementById('sample-posts-btn');
var samplePostsContainer = document.getElementById('sample-posts-container');
    
if(samplePostsBtn) {
    samplePostsBtn.addEventListener("click",function(){
        
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('GET', sendingData.siteURL + '/wp-json/wp/v2/posts?categories=4&order=asc');
        ourRequest.onload = function() {
        if (ourRequest.status >= 200 && ourRequest.status < 400) {
            var data = JSON.parse(ourRequest.responseText);
            createHTML(data);
            samplePostsBtn.remove();
        } else {
            console.log("We connected to the server, but it returned an error.");
        }
        };

        ourRequest.onerror = function() {
        console.log("Connection error");
        };

        ourRequest.send();
    });
}

function createHTML(postsData){
    
    var postHTMLString = "";
    var postsDataLength = postsData.length;
    for(i = 0;i< postsDataLength;i++){

        postHTMLString += '<a href="'+postsData[i].link+'"><h2>' + postsData[i].title.rendered + '</h2></a>';
        postHTMLString += postsData[i].excerpt.rendered;
    }

    samplePostsContainer.innerHTML = postHTMLString;

}

var quickAddBtn = document.querySelector("#quick-add-button");

if(quickAddBtn){
    quickAddBtn.addEventListener("click", function(){
        var postData = {
            'title': document.querySelector(".admin-quick-add [name='title']").value,
            'content': document.querySelector(".admin-quick-add [name='content']").value,
            "status": "publish"
        }

        var createPost = new XMLHttpRequest();
        createPost.open('POST', sendingData.siteURL + '/wp-json/wp/v2/posts');
        createPost.setRequestHeader("X-WP-Nonce", sendingData.nonce);
        createPost.setRequestHeader("Content-Type","application/json;chartset=UTF-8");
        createPost.send(JSON.stringify(postData));
        createPost.onreadystatechange = function(){
            if (createPost.readyState == 4) {
                if (createPost.status == 201) {
                    document.querySelector(".admin-quick-add [name='title']").value = "";
                    document.querySelector(".admin-quick-add [name='content']").value = "";
                } else {
                    alert("Error - try again");
                }
            } 
        }
    });
}