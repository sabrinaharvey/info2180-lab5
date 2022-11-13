window.onload = function(){
    let lookup = document.getElementById('lookup');
    
    
    lookup.addEventListener("click", function(element){
        element.preventDefault();
        

        var httpReq = new XMLHttpRequest();
        var country = document.getElementById('country').value;
        
        var url = "world.php?country=" + country;

        httpReq.onreadystatechange = function(){
            if(httpReq.readyState === XMLHttpRequest.DONE){
                if(httpReq.status === 200){
                    document.querySelector("#result").innerHTML = this.responseText;
                    
                }
            
                else{
                    alert('There was a problem with the request.');
                }
            }
        }
        httpReq.open('GET', url, true);
        httpReq.send();
        
    });
}
