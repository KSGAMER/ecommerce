export class Orders {
    constructor(
        public orderNumber: string,
        public productName: string,
        public quantityOrdered: number,
        public MSRP: number
    ) {}
}
