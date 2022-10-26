import { GetStaticPaths, GetStaticProps } from "next";
import axios from "../../../services/axios";
import { ProductProps } from "../../../ts/interfaces/ProductsInterface";
import ProductType from "../../../ts/types/product";
import styles from "../../../styles/Product.module.css";
import placeholder from "../../../public/placeholder.png";
import Image from "next/image";
import Link from "next/link";
import { NextRouter, useRouter } from "next/router";
import { ChangeEvent, useState } from "react";

export default function Product({ product }: ProductProps) {
	const router = useRouter();
	const [quantity, setQuantity] = useState(1);

	function changeQuantityValue(e: ChangeEvent<HTMLInputElement>) {
		setQuantity(parseInt(e.target.value));
	}

	async function addItemToCart(
		product_id: number,
		quantity: number,
		router: NextRouter
	) {
		const response = await axios.post("/cart", {
			params: {
				quantity,
				product_id,
			},
		});
		const { data: cart } = await response.data;

		console.log(cart);
	}

	return (
		<>
			<h1 className={styles.title}>{product.name}</h1>

			<figure className={styles.product_frame}>
				<Image
					src={placeholder}
					alt="Imagem placeholder para produto!"
					width={250}
					height={200}
				/>
			</figure>

			<p>
				<strong>Peso:</strong> {product.weight}
			</p>

			<div className={styles.input_container}>
				<label htmlFor="quantity" className={styles.label}>
					Quantidade:
				</label>
				<input
					type="number"
					name="quantity"
					id="quantity"
					value={quantity}
					onChange={changeQuantityValue}
					className={styles.input}
				/>
			</div>

			<button
				type="button"
				className={styles.cart_button}
				onClick={async () => {
					await addItemToCart(product.id, quantity, router);
				}}
			>
				Comprar
			</button>

			{/*  */}
		</>
	);
}

export const getStaticPaths: GetStaticPaths = async () => {
	const response = await axios.get("/products");
	const { data: products } = await response.data;

	const paths = products.map((product: ProductType) => ({
		params: { slug: product.slug },
	}));

	return { paths, fallback: false };
};

export const getStaticProps: GetStaticProps = async ({ params }) => {
	const response = await axios.get(`/products/${params?.slug}`);
	const { data: product } = await response.data;

	return {
		props: {
			product,
		},
	};
};
