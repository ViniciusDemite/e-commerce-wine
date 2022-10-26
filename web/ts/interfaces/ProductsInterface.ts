import { PropsWithChildren } from "react";
import ProductType from "../types/product";

export interface ProductsProps extends PropsWithChildren {
	products: ProductType[];
}

export interface ProductProps extends PropsWithChildren {
	product: ProductType;
}

export interface FormProps extends PropsWithChildren {
	product_id: number;
}
