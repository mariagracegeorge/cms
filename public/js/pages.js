var pages = {
        ready: function() {
          $('body').off('click','button#btn-create-page').on('click','button#btn-create-page', pages.createNewPage);
          $('body').off('click','#cancel-create-page').on('click','#cancel-create-page' , function() {
                window.location = '/home';
            });
          $('body').off('click','button#btn-edit-page').on('click','button#btn-edit-page', pages.updateProduct);
          $('body').off('click','#cancel-edit-page').on('click','#cancel-edit-page' , function() {
                var parentSlug = $('#parent-slug').val();
                window.location = '/category/' + parentSlug;
            });
          $('body').off('click','#delete-product').on('click','#delete-product' , pages.deleteProduct);
        },

        createNewPage: function(){
          var pageName = $('input[id=page-name]').val();
          var pageSlug = $('input[id=page-slug]').val();
          var pageContent = $('input[id=page-content]').val();
          var parentId = $('#parent-id').val();
          var type = $('#type').val();

          $.ajax({
            url        : '/create-page',
            method     : 'GET',
            type       : 'json',
            data       : {
              _token : pages.csrf_token,
              pageName: pageName,
              pageSlug: pageSlug,
              pageContent: pageContent,
              parentId: parentId,
              type: type
            },
            success    : function(response){
              if(response.status == 1) {
                window.location = '/home';
                alert(response.message);
              }
              else {
                  return;
              }
            },
            error      : function(response){
              alert('Sorry, please try again.');
            }
          });
        },

        updateProduct: function(){
          var productName = $('input[id=product-name]').val();
          var productSlug = $('input[id=product-slug]').val();
          var productContent = $('input[id=product-content]').val();
          var productId = $('#product-id').val();

          $.ajax({
            url        : '/category/update/' + productId,
            method     : 'GET',
            type       : 'json',
            data       : {
              _token : pages.csrf_token,
              productName: productName,
              productSlug: productSlug,
              productContent: productContent
            },
            success    : function(response){
              if(response.status == 1) {
                window.location = '/category/' + productSlug;
                alert(response.message);
              }
              else {
                  return;
              }
            },
            error      : function(response){
              alert('Sorry, please try again.');
            }
          });
        },

        deleteProduct: function(){
          var productId = $(this).attr('data-id');

          $.ajax({
            url        : '/category/delete/' + productId,
            method     : 'GET',
            type       : 'json',
            data       : {
            },
            success    : function(response){
              if(response.status == 1) {
                window.location.reload();
                alert(response.message);
              }
              else {
                  return;
              }
            },
            error      : function(response){
              alert('Sorry, please try again.');
            }
          });
        }

};
