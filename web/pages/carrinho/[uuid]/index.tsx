import { GetServerSideProps } from "next";
import axios from "../../../services/axios";

export default function Cart() {
	return <h1>Carrinho</h1>;
}

export const getServerSideProps: GetServerSideProps = async () => {
	const response = await axios.get("/cart");
	const { data: products } = await response.data;

	return {
		props: {
			products,
		},
	};
};
