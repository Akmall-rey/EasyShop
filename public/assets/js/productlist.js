const searchProductIdInput = document.getElementById("search-product-id-input");
        const searchProductBtn = document.getElementById("search-product-btn");
        const productTableBody = document.getElementById("product-table-body");

        let products = JSON.parse(localStorage.getItem("products")) || [];

        function renderProductTable(productsToRender) {
            productTableBody.innerHTML = "";
            for (let i = 0; i < productsToRender.length; i++) {
                const product = productsToRender[i];
                const tr = document.createElement("tr");
                const idTd = document.createElement("td");
                const imageTd = document.createElement("td");
                const nameTd = document.createElement("td");
                const quantityTd = document.createElement("td");
                const priceTd = document.createElement("td");
                const actionsTd = document.createElement("td");
                const deleteBtn = document.createElement("button");
                deleteBtn.className = "btn btn-delete btn-custom";
                idTd.innerText = product.id;
                const img = document.createElement("img");
                img.src = product.image;
                img.style.width = "50px";
                imageTd.appendChild(img);
                nameTd.innerText = product.name;
                quantityTd.innerText = product.quantity;
                priceTd.innerText = `$${product.price.toFixed(2)}`;
                deleteBtn.innerText = "Delete";
                deleteBtn.addEventListener("click", () => {
                    deleteProduct(product.id);
                });
                actionsTd.appendChild(deleteBtn);
                tr.appendChild(idTd);
                tr.appendChild(imageTd);
                tr.appendChild(nameTd);
                tr.appendChild(quantityTd);
                tr.appendChild(priceTd);
                tr.appendChild(actionsTd);
                productTableBody.appendChild(tr);
            }
        }

        function searchProductById() {
            const productId = searchProductIdInput.value.trim();
            if (productId) {
                const product = products.find(product => product.id === productId);
                if (product) {
                    renderProductTable([product]);
                } else {
                    alert("Product not found");
                }
            } else {
                alert("Please enter a product ID");
            }
        }

        function deleteProduct(productId) {
            products = products.filter((product) => product.id !== productId);
            localStorage.setItem("products", JSON.stringify(products));
            searchProductIdInput.value = "";
            productTableBody.innerHTML = "";
        }

        searchProductBtn.addEventListener("click", searchProductById);

        renderProductTable(products);