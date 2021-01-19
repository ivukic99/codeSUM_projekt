<template>
	<v-app>
		<v-container class="container-margin" style="margin-bottom: 132px">
			<v-timeline :dense="$vuetify.breakpoint.smAndDown">
				<v-timeline-item v-for="(item, i) in items" :key="i" color="#1B4188">

					<v-hover v-slot:default="{ hover }" open-delay="100">
						<v-card :elevation="hover ? 18 : 4">
							<v-card-title style="background: #1B4188;">
								<h2 class="display-1 white--text font-weight-light">{{ item.heading }}</h2>
							</v-card-title>
							<v-container>
								<v-row>
									<v-col cols="12" md="10" v-text="item.text"></v-col>
								</v-row>
							</v-container>
						</v-card>
					</v-hover>
				</v-timeline-item>
			</v-timeline>
		</v-container>
	</v-app>
</template>

<script>
export default {
	name: 'TimeLine',
	data: () => ({
		items: [
			{
				oppositeText: 'Naslov1',
				heading: 'Rješavanje zadataka',
				text:
          'CodeSUM sadrži nekoliko tipova tečajeva.Svaki tečaj na CodeSUM nudi nekoliko različitih tipova zadataka.',
				icon: 'mdi-calendar',
			},
			{
				oppositeText: 'Naslov2',
				heading: 'Rješavanje izazova',
				text:
          'CodeSUM pruža mogućnost rješavanja programskih zadataka putem interaktivnog programskog sučelja.',
				icon: 'mdi-calendar',
			},
			{
				oppositeText: 'Naslov3',
				heading: 'Kreiranje klanova',
				text:
          'Korisnici se mogu udruživati u klanove i zajednički prikupljati bodove',
				icon: 'mdi-calendar',
            },
            {
				oppositeText: 'Naslov4',
				heading: 'Skupljanje bodova',
				text:
          'Svaki izazov, svaki tečaj i svaki zadatak unutar tečaja nosi svoju bodovnu vrijednost. Bodovi se upisuju u bodovni sustav tečaja, ali i globalno.',
				icon: 'mdi-calendar',
            },
            {
				oppositeText: 'Naslov5',
				heading: 'Certifikati',
				text:
          'Nakon završetka svih zadataka u sklopu nekog tečaja korisnik dobiva CoudeSUM certifikat.',
				icon: 'mdi-calendar',
			}
		],
	}),
};
</script>

<style>
  #app .v-card__title {
    word-break: normal;
  }
</style>