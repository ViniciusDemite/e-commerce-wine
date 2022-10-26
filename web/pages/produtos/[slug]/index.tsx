import { GetStaticPaths, GetStaticProps } from "next";
import axios from "../../../services/axios";
import { ProductProps } from "../../../ts/interfaces/ProductsInterface";
import ProductType from "../../../ts/types/product";
import styles from "../../../styles/Product.module.css";
import placeholder from "../../../public/placeholder.png";
import Image from "next/image";
import Form from "../../../components/product/form";

export default function Product({ product }: ProductProps) {
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

			<Form product_id={product.id} />
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
