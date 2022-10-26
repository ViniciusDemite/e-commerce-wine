import { PropsWithChildren } from "react";
import { CartType } from "../types/cart";

interface CartProps extends PropsWithChildren {
	cart: CartType;
}

export default CartProps;
