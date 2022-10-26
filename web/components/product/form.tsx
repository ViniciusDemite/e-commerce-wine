import { ChangeEvent, useState } from "react";
import axios from "../../services/axios";
import styles from "../../styles/Form.module.css";
import { FormProps } from "../../ts/interfaces/ProductsInterface";

export default function Form({ product_id }: FormProps) {
	const [quantity, setQuantity] = useState(1);

	function changeQuantityValue(e: ChangeEvent<HTMLInputElement>) {
		let quantity = parseInt(e.target.value);
		setQuantity(quantity);
	}

	const handleSubmit = async (event: any) => {
		event.preventDefault();

		const params = {
			cart_id: null,
			quantity: event.target.quantity.value,
			product_id: event.target.id.value,
		};

		const response = await axios.post("http://localhost:5500/api/cart", {
			params,
		});
		console.log(response);
	};

	return (
		<form onSubmit={handleSubmit} method="POST">
			<input type="hidden" name="id" value={product_id} />

			<div className={styles.input_container}>
				<label htmlFor="quantity" className={styles.label}>
					Quantidade:
				</label>
				<input
					type="number"
					name="quantity"
					id="quantity"
					value={quantity}
					min="1"
					onChange={changeQuantityValue}
					className={styles.input}
				/>
			</div>

			<button type="submit" className={styles.cart_button}>
				Comprar
			</button>
		</form>
	);
}
