import { Injectable } from '@angular/core';
import { Product } from './product';

@Injectable()
export class Cart {
    private lines: CartLine[] = [];
    public itemCount = 0;
    public cartPrice = 0;

    addLine(product: Product, quantity: number) {
        const line = this.lines.find(line => line.product.productCode === product.productCode);
        if(line !== undefined) {
            // line.quantity += quantity;
            // console.log(quantity);
            line.quantity = quantity == null ?  line.quantity += quantity=1 : quantity; 
        } else {
            this.lines.push(new CartLine(product, quantity = 1));
        }
        this.recalculate();
    }
    deleteLine(index : number) {
        this.lines.splice(index, 1);
        this.recalculate();
    }

    getCartLine() { 
        return this.lines;
    }

    recalculate() {
        this.itemCount = 0;
        this.cartPrice = 0;
        this.lines.forEach(l => {
            this.itemCount += l.quantity;
            // console.log(this.itemCount);
            this.cartPrice += (l.quantity * l.product.MSRP);
        });
    }
}

export class CartLine {
    constructor(public product: Product, public quantity: number) {}

    get lineTotal(): number {
        return this.quantity * this.product.MSRP;
    }
}