import { Component, OnInit } from '@angular/core';
import { Orders } from 'src/app/model/orders';
import { OrdersRepositoryService } from 'src/app/model/orders-repository.service';

@Component({
  selector: 'app-orders',
  templateUrl: './orders.component.html',
  styleUrls: ['./orders.component.css']
})
export class OrdersComponent implements OnInit {

  constructor(private orderRepoService: OrdersRepositoryService) { }

  ngOnInit() {
  }

  get orders(): Orders[] {
    return this.orderRepoService.getOrders();
  }

}
