
<style> 
    svg{
        width: 100px;
        height: 100px;
        margin: 20px;
        display:inline-block;
        position: absolute;
        top: 40%;
    }
    .loading-overlay{
        width: 100%;
        height: 100%;
        z-index: 9999;
        position: fixed;
        background-color: rgb(216, 230, 233);
    }
    /* https://codepen.io/nikhil8krishnan/pen/rVoXJa some pretty svgs */
</style>

<div class="loading-overlay d-flex justify-content-center w-100 h-100 position-fixed d-none">
   

        <svg version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
        <circle fill="#3498db" stroke="none" cx="6" cy="50" r="6">
        <animateTransform 
            attributeName="transform" 
            dur="1s" 
            type="translate" 
            values="0 15 ; 0 -15; 0 15" 
            repeatCount="indefinite" 
            begin="0.1"/>
        </circle>
        <circle fill="#3498db" stroke="none" cx="30" cy="50" r="6">
        <animateTransform 
            attributeName="transform" 
            dur="1s" 
            type="translate" 
            values="0 10 ; 0 -10; 0 10" 
            repeatCount="indefinite" 
            begin="0.2"/>
        </circle>
        <circle fill="#3498db" stroke="none" cx="54" cy="50" r="6">
        <animateTransform 
            attributeName="transform" 
            dur="1s" 
            type="translate" 
            values="0 5 ; 0 -5; 0 5" 
            repeatCount="indefinite" 
            begin="0.3"/>
        </circle>
    </svg>

</div>


<script>

function loader_status(status = false)
        {
            if(status == true)
            {
                let loader = document.querySelector('.loading-overlay'); 
                loader ? loader.classList.remove('d-none') : console.log('there is a issue detecting the loader');
            }
            if(status == false)
            {
                let loader = document.querySelector('.loading-overlay'); 
                loader ? loader.classList.add('d-none') : console.log('there is a issue detecting the loader');
            }

        }

</script>