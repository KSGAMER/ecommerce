import { Injectable } from '@angular/core';
import { Orders } from './orders';
import { OrdersDatasourceService } from './orders-datasource.service';

@Injectable({
  providedIn: 'root'
})
export class OrdersRepositoryService {

  private orders: Orders[] = [];

  constructor(private dataSourceService: OrdersDatasourceService) {
    dataSourceService.getOrders().subscribe((response) => {
      this.orders = response['orders'];
    });
  };

  getOrders(): Orders[] {
    return this.orders;
  }

  postOrders(cart: any[]): any {
    this.dataSourceService.postOrders(cart);
  }
}
