import { Component, OnInit } from '@angular/core';
import { Cart } from 'src/app/model/cart';
import { Product } from 'src/app/model/product';
import { OrdersRepositoryService } from 'src/app/model/orders-repository.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  constructor(private cart: Cart, private order: OrdersRepositoryService, private route: Router) { }
  private cartline = [];
  private position: number;

  ngOnInit() {
    this.cartline = this.cart.getCartLine();
    if(this.cartline.length == 0) {
      this.route.navigate(['/store'])
    }
  }

  changeQuantity(product: Product, quantity: number) {
    this.cart.addLine(product,+quantity);
  }

  onIndex(i: number) {
    this.position = i;
  }

  onDelete() {
    this.cart.deleteLine(this.position);
  }
}
