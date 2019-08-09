import { Injectable } from '@angular/core';
import { Product } from './product';
import { ProductDatasourceService } from './product-datasource.service';

@Injectable({
  providedIn: 'root'
})
export class ProductRepositoryService {
  private products: Product[] = [];
  private categories: string[] = [];
  private scales: string[] = [];
  private vendor: string[] = [];

  constructor(private dataSourceService: ProductDatasourceService) {
    dataSourceService.getProducts().subscribe((response) => {
      this.products = response['products'];
      // console.log(this.products);
      this.categories = response['products'].map(p => p.productLine).filter((c, index, array) => array.indexOf(c) === index).sort();
      this.scales = response['products'].map(p => p.productScale).filter((c, index, array) => array.indexOf(c) === index).sort();
      this.vendor = response['products'].map(p => p.productVendor).filter((c, index, array) => array.indexOf(c) === index).sort();
    });
  };

  getProducts(productLine: string = null, productScale: string = null, productVendor: string = null): Product[] {
    return this.products.filter((product) => (productLine == null || product.productLine === productLine) && (productScale == null || productScale === product.productScale)  && (productVendor == null || productVendor === product.productVendor));
  }

  getProduct(productCode: string) {
    return this.products.filter(product => (productCode === product.productCode));
  }

  getCategories(): string[] {
    return this.categories;
  }

  getScales(): string[] {
    return this.scales;
  }

  getVendors(): string[] {
    return this.vendor;
  }
}
