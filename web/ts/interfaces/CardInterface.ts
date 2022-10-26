import { PropsWithChildren } from "react";
import ProductType from "../types/product";

interface CardProps extends PropsWithChildren {
	product: ProductType;
}

export default CardProps;
