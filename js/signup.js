
if (signupFormEl) {
    window.scroll({
        top: 250,

        behavior: 'smooth'
    });
}
if (loginForm) {
    window.scroll({
        top: 240,

        behavior: 'smooth'
    });
}
const checkoutForm15=document.querySelector('.checkout-form');
if(checkoutForm15){
    window.scroll({
        top: 220,

        behavior: 'smooth'
    });
}
const order_details_table=document.querySelector('.orders_details_table');
if(order_details_table){
    window.scroll({
        top: 600,

        behavior: 'smooth'
    });
}const account=document.querySelector('.myaccount-content');
if(account && !order_details_table ){
    window.scroll({
        top: 200,

        behavior: 'smooth'
    });
}
const checkout_page=document.querySelector('.order-details-table-wrap');
if(checkout_page ){
    window.scroll({
        top: 400,

        behavior: 'smooth'
    });
}
const thank_page=document.querySelector('.page-not-found-area');
if(thank_page ){
    window.scroll({
        top: 320,

        behavior: 'smooth'
    });
}
const review_page=document.querySelector('.review_comment_button');
if(review_page ){
    review_page.addEventListener('click',()=>{
        if(review_page.classList.contains('active')){
            window.scroll({
                top: 600,
    
                behavior: 'smooth'
            });
    
        }

    })
   

}