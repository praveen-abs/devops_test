
export default class ProductService {

    getProductsSmall() {
      return fetch('/public/demo/products.json').then(res => res.json()).then(d => d.data);
   }
 
   getProducts() {
      return fetch('/public/demo/products.json').then(res => res.json()).then(d => d.data);
    }
 
    getProductsWithOrdersSmall() {
      return fetch('/public/demo/products.json').then(res => res.json()).then(d => d.data);
   }
 }
 
    