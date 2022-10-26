import { PropsWithChildren } from "react";
import ProductType from "../types/product";

interface ProductsProps extends PropsWithChildren {
	products: ProductType[];
}

export default ProductsProps;
