import { Component, OnInit } from '@angular/core';
import { ProductRepositoryService } from '../model/product-repository.service';
import { Product } from '../model/product';
import { Cart } from '../model/cart';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})
export class StoreComponent implements OnInit {
  public selectedCategory = null;
  public selectedScale = null;
  public selectedVendor = null;
  public productsPerPage = 12;
  public selectedPage = 1;
  constructor(private productReposService: ProductRepositoryService, private cart: Cart) {

  }

  ngOnInit() {

  }

  get products(): Product[] {
    const pageIndex = (this.selectedPage - 1) * this.productsPerPage;
    return this.productReposService.getProducts(this.selectedCategory, this.selectedScale, this.selectedVendor).slice(pageIndex, pageIndex + +this.productsPerPage);
  }

  get categories(): string[] {
    return this.productReposService.getCategories();
  }

  get scales(): string[] {
    return this.productReposService.getScales();
  }

  get vendors(): string[] {
    return this.productReposService.getVendors();
  }


  changeCategory(newCategory?: string) {
    this.chagePage(1);
    this.selectedCategory = this.selectedCategory == null ? newCategory : this.selectedCategory == newCategory ? null : newCategory;
  }

  changeScale(newScale?: string) {
    this.selectedPage = 1;
    this.selectedScale = this.selectedScale == null ? newScale : this.selectedScale == newScale ? null : newScale;
  }

  changeVendor(newVendor?: string) {
    this.selectedPage = 1;
    this.selectedVendor = this.selectedVendor == null ? newVendor : this.selectedVendor == newVendor ? null : newVendor;
  }

  chagePage(newNumber: number) {
    this.selectedPage = newNumber;
  }

  changePageSize(newSize: number) {
    this.productsPerPage = newSize;
    this.chagePage(1);
  }

  get pageNumbers(): number[] {
    return Array(Math.ceil(this.productReposService.getProducts(this.selectedCategory, this.selectedScale, this.selectedVendor).length / this.productsPerPage)).fill(0).map((x, i) => i + 1);
  }

  addProduct(product: Product) {
    this.cart.addLine(product, null);
  }
}
