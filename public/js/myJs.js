
    function loveProduct(product,mac) {
        
        let lovedProducts = JSON.parse(localStorage.getItem('lovedProducts')) || [];

        // Check if the product already exists in the loved products array
        let exists = lovedProducts.find(item => item.id === product.id);

        if (!exists) {
            lovedProducts.push(product);
            localStorage.setItem('lovedProducts', JSON.stringify(lovedProducts));
            alert('Product added to favorites');
        } else {
            console.log('Product is already in favorites');
        }
    }

