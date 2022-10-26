import { GetServerSideProps } from "next";
import axios from "../../../services/axios";
import CartProps from "../../../ts/interfaces/CartInterface";
import { ItemType } from "../../../ts/types/item";

export default function Cart({ cart }: CartProps) {
	return (
		<>
			<h1>Carrinho</h1>

			<div>
				<ul>
					{cart.items.map((item: ItemType, index: number) => (
						<li key={index}>{item.product.name}</li>
					))}
				</ul>
			</div>
		</>
	);
}

export const getServerSideProps: GetServerSideProps = async (context) => {
	const id = context.params?.uuid;
	const response = await axios.get(`/cart/${id}`);
	const { data: cart } = await response.data;

	return {
		props: {
			cart,
		},
	};
};
