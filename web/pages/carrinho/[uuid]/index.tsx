import { GetServerSideProps } from "next";
import axios from "../../../services/axios";
import CartProps from "../../../ts/interfaces/CartInterface";
import { ItemType } from "../../../ts/types/item";
import styles from "../../../styles/Cart.module.css";
import Shipping from "../../../components/cart/shipping";

export default function Cart({ cart }: CartProps) {
	return (
		<>
			<h1 className={styles.title}>Carrinho</h1>

			<div className={styles.list_container}>
				<ul className={styles.list}>
					{cart.items.map((item: ItemType, index: number) => (
						<li key={index} className={styles.list_item}>
							<strong>{item.product.name}</strong>
							<span>
								<strong>Peso:</strong>&nbsp;
								{item.product.weight}
							</span>
						</li>
					))}
				</ul>

				<Shipping />
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
