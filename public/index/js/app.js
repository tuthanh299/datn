/* Open user btn */
window.onload = function() { 
    var openBtn = document.getElementById('open-user-btn'); 
    var closeBtn = document.getElementById('close-user-btn'); 
    var account = document.querySelector('.header-bottom-account-hidden');  
    openBtn.addEventListener('click', toggleAccount);
    closeBtn.addEventListener('click', toggleAccount); 
    function toggleAccount() { 
        if (account.style.display === 'none') { 
            account.style.display = 'block';
        } else { 
            account.style.display = 'none';
        }
    }
}
