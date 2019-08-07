import { Component, OnInit } from '@angular/core';
import { Cart } from 'src/app/model/cart';
import { Product } from 'src/app/model/product';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  constructor(private cart: Cart) { }
  private cartline = [];

  ngOnInit() {
    this.cartline = this.cart.getCartLine();
  }

  changeQuantity(product: Product, quantity: number) {
    this.cart.addLine(product,+quantity);
  }

  onIndex(i: number) {
    console.log(i);
    this.cart.deleteLine(i);
  }
}
