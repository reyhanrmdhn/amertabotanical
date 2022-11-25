 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>404 Error</title>
     <link rel="stylesheet" href="<?= base_url('vendor/template/') ?>css/main.css">
 </head>
 <style>
     .error-part {
         padding: 100px 0px;
         text-align: center;
     }

     .error-part h1 {
         margin-bottom: 10px;
         color: var(--primary);
     }

     .error-part img {
         margin-bottom: 30px;
     }

     .error-part h3 {
         text-transform: uppercase;
         margin-bottom: 3px;
     }

     .error-part p {
         margin-bottom: 20px;
     }

     .error-part a {
         font-size: 14px;
         padding: 10px 35px;
         border-radius: 8px;
         letter-spacing: 0.3px;
         color: var(--white);
         background: var(--primary);
         text-transform: uppercase;
     }

     @media (max-width: 767px) {
         .error-part {
             padding: 60px 0px;
         }
     }

     @media (min-width: 768px) and (max-width: 1199px) {
         .error-part {
             padding: 80px 0px;
         }
     }
 </style>

 <body>
     <section class="error-part">
         <div class="container">
             <h1>404 | Not Found</h1>
             <h3>ooopps! this page can't be found.</h3>
             <p>It looks like nothing was found at this location.</p>
             <a href="<?= base_url() ?>">go to home</a>
         </div>
     </section>
 </body>

 </html>