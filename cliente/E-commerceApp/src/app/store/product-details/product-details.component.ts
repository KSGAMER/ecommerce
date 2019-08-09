import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { ProductRepositoryService } from 'src/app/model/product-repository.service';
import { Product } from 'src/app/model/product';
import { Cart } from 'src/app/model/cart';

@Component({
  selector: 'app-product-details',
  templateUrl: './product-details.component.html',
  styleUrls: ['./product-details.component.css']
})
export class ProductDetailsComponent implements OnInit {
  
  private param: string;
  constructor(private cart: Cart, private routerNav: ActivatedRoute, private productService: ProductRepositoryService) {
   this.routerNav.params.subscribe((param: Params) => {
    this.param = param["id"];
   }) 
  }

  ngOnInit() {
  }

  get Product(): Product[] {
    return this.productService.getProduct(this.param);
  }

  addProduct(product: Product) {
    this.cart.addLine(product, null);
  }

}
