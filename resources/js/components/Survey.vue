<template>
  <div>
    <Navbar />
    <div v-if="!finished">
      <div class="container">
        <form-wizard
          @on-complete="onComplete"
          shape="square"
          color="#17a2b8"
          title="Pyetesori"
          subtitle="Ju lutem plotesoni pyetesorin e meposhtem"
        >
          <tab-content
            title="Te dhenat personale"
            icon="ti-user"
            ref="step1"
            :before-change="next"
          >
            <div class="container" @on-validate="mergePartialModels">
              <b-form>
                <b-form-group
                  id="input-group-2"
                  label="Emri juaj:"
                  label-for="input-2"
                >
                  <b-form-input
                    id="input-1"
                    type="text"
                    v-model.trim="$v.name.$model"
                    required
                    placeholder="Shkruani emrin dhe mbiemrin"
                  ></b-form-input>
                  <div class="text-danger" v-if="!$v.name.required">
                    *Emri duhet te shkruhet
                  </div>
                </b-form-group>

                <b-form-group
                  id="input-group-2"
                  label="Numri i telefonit:"
                  label-for="input-2"
                >
                  <b-form-input
                    id="input-2"
                    v-model.trim="$v.phone.$model"
                    type="text"
                    name="phone"
                    required
                    placeholder="Shkruani numrin e telefonit"
                  ></b-form-input>
                  <div class="text-danger" v-if="!$v.phone.required">
                    *Nr i tel duhet te shkruhet
                  </div>
                </b-form-group>
              </b-form>
            </div>
          </tab-content>
          <tab-content title="Pyetjet" icon="ti-help">
            <b-form-group @on-validate="mergePartialModels">
              <div v-for="question in questions" :key="question.id">
                {{ question.content }}

                <b-form-radio
                  @change="addAnswer(question.id, 'PO')"
                  :name="'question' + question.id"
                  value="PO"
                  >PO</b-form-radio
                >
                <b-form-radio
                  @change="addAnswer(question.id, 'JO')"
                  :name="'question' + question.id"
                  value="JO"
                  >JO</b-form-radio
                >
              </div>
            </b-form-group>
          </tab-content>
          <tab-content title="Perfundimi" icon="ti-check">
            <div class="text-center" @on-validate="mergePartialModels">
              <h4>
                Faleminderit qe i plotesuat pyetjet e formularit <br />
                Per te perfunduar, klikoni ne butonin Finish
              </h4>

              <br /><br />
              <h4>JU LUTEM QENDRONI NE SHTEPI</h4>
              <br />
              <svg
                id="Layer_2"
                enable-background="new 0 0 64 64"
                height="150"
                viewBox="0 0 64 64"
                width="150"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g>
                  <g>
                    <g>
                      <path
                        d="m60 22.46v35.54c0 2.21-1.79 4-4 4h-48c-2.21 0-4-1.79-4-4v-35.54c.6.35 1.28.54 2 .54.58 0 1.14-.12 1.68-.37l.32-.15v31.37 2.15h6 6 6 12 6 6 6v-2.15-31.37l.33.15c.52.25 1.09.37 1.67.37.72 0 1.4-.2 2-.54z"
                        fill="#ffeaa7"
                      />
                    </g>
                    <g>
                      <path
                        d="m4 22.46c-.7-.4-1.28-1.02-1.63-1.79-.45-.96-.49-2.05-.12-3.05.37-1.01 1.1-1.8 2.08-2.25l25.99-12c.52-.24 1.1-.37 1.68-.37s1.16.13 1.68.37l26 12c.97.45 1.7 1.24 2.07 2.25.37 1 .33 2.09-.12 3.06-.35.76-.93 1.37-1.63 1.78-.6.34-1.28.54-2 .54-.58 0-1.15-.12-1.67-.37l-.33-.15-24-11.07-24 11.07-.32.15c-.54.25-1.1.37-1.68.37-.72 0-1.4-.19-2-.54z"
                        fill="#ef7385"
                      />
                    </g>
                    <g>
                      <path
                        d="m32 11.41-24 11.07v31.37h48v-31.37z"
                        fill="#e6e9ed"
                      />
                    </g>
                    <g>
                      <path
                        d="m37 30-4.03-.58c-1.17-.17-2.14-.91-2.63-1.92l-3.34 2.5h-1c-.53 0-1.01.2-1.36.54l-.16-.61-.32-1.29c-.11-.43-.16-.86-.16-1.3 0-1.48.6-2.81 1.56-3.78.14-.14.29-.27.44-.39.91-.73 2.07-1.17 3.34-1.17h9.66c.26 0 .5.1.68.26.2.19.32.45.32.74v2.84c0 1.39-.15 2.78-.45 4.14-.04.21-.09.41-.14.61-.36-.37-.86-.59-1.41-.59z"
                        fill="#fcd770"
                      />
                    </g>
                    <g>
                      <path
                        d="m44.72 28.17c-.75.45-2.91 1.63-5.17 1.81.3-1.36.45-2.75.45-4.14v-2.84c0-.29-.12-.55-.32-.74.52-.17 1.08-.26 1.66-.26h5.32c2.95 0 5.34 2.39 5.34 5.34 0 .44-.05.87-.16 1.3l-.47 1.9-.01.01c-.35-.35-.83-.55-1.36-.55h-1l-2.06-.41c-.92-.18-1.7-.7-2.22-1.42z"
                        fill="#b27946"
                      />
                    </g>
                    <g>
                      <path
                        d="m18.86 27.68-3.86 2.32h-1c-.53 0-1.01.2-1.36.55l-.01-.01-.47-1.9c-.11-.43-.16-.86-.16-1.3 0-2.95 2.39-5.34 5.34-5.34h5.32c1.26 0 2.42.44 3.34 1.17-.15.12-.3.25-.44.39-.96.97-1.56 2.3-1.56 3.78 0 .44.05.87.16 1.3l.32 1.29-2.52-.36c-1.29-.19-2.39-.89-3.1-1.89z"
                        fill="#b27946"
                      />
                    </g>
                    <g>
                      <path
                        d="m50 56h-6v-2.15c0-2.99-.88-5.85-2.45-8.26-.93-1.43-2.1-2.7-3.46-3.73-.03-.04-.07-.07-.1-.08l.01-.01c.92-.69 1.92-1.29 3-1.77l.11.21c.27.55.99 1 1.65 1.31.65.31 1.24.48 1.24.48s2.35-.69 2.89-1.79l.11-.21c5.47 2.43 9 7.86 9 13.85v2.15z"
                        fill="#5cd6b3"
                      />
                    </g>
                    <g>
                      <path
                        d="m51.41 30.59c.37.36.59.86.59 1.41 0 1.1-.9 2-2 2h-1.5l.5-4h1c.53 0 1.01.2 1.36.55.02.01.03.02.05.04z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m49 30-.5 4-.28 2.25c-.13 1-.98 1.75-1.99 1.75h-.23-4-.23c-1.01 0-1.86-.75-1.99-1.75l-.35-2.85-.01-.01c.37-.36.58-.85.58-1.39 0-.55-.22-1.05-.59-1.41.05-.2.1-.4.14-.61 2.26-.18 4.42-1.36 5.17-1.81.52.72 1.3 1.24 2.22 1.42z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m46 38 1 2-.11.21c-.54 1.1-2.89 1.79-2.89 1.79s-.59-.17-1.24-.48c-.66-.31-1.38-.76-1.65-1.31l-.11-.21 1-2z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m38 56h-12-6v-2.15c0-4.77 2.24-9.18 5.91-11.99l2.09 3.14 4-3 4 3 2.09-3.14c1.36 1.03 2.53 2.3 3.46 3.73 1.57 2.41 2.45 5.27 2.45 8.26v2.15z"
                        fill="#ef7385"
                      />
                    </g>
                    <g>
                      <path
                        d="m39.41 30.59c.37.36.59.86.59 1.41 0 .54-.21 1.03-.58 1.39-.35.38-.86.61-1.42.61h-1.5l.5-4h1c.55 0 1.05.22 1.41.59z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m37.99 41.78c.03.01.07.04.1.08l-2.09 3.14-4-3 3-2c1.08.48 2.08 1.07 2.99 1.78z"
                        fill="#e6e9ed"
                      />
                    </g>
                    <g>
                      <path
                        d="m37 30-.5 4-.28 2.25c-.13 1-.98 1.75-1.99 1.75h-.23-4-.23c-1.01 0-1.86-.75-1.99-1.75l-.28-2.25-.5-4 3.34-2.5c.49 1.01 1.46 1.75 2.63 1.92z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g><path d="m34 38 1 2-3 2-3-2 1-2z" fill="#f0d0b4" /></g>
                    <g>
                      <path
                        d="m32 42-4 3-2.09-3.14c.03-.04.07-.07.1-.08.91-.71 1.91-1.3 2.99-1.78z"
                        fill="#e6e9ed"
                      />
                    </g>
                    <g>
                      <path
                        d="m27 30 .5 4h-1.5c-.56 0-1.07-.23-1.42-.61-.37-.36-.58-.85-.58-1.39 0-.55.22-1.05.59-1.41l.05-.05c.35-.34.83-.54 1.36-.54z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m25.91 41.86c-3.67 2.81-5.91 7.22-5.91 11.99v2.15h-6-6v-2.15c0-5.99 3.53-11.42 9-13.85l.11.21c.54 1.1 1.66 1.79 2.89 1.79s2.35-.69 2.89-1.79l.11-.21c1.08.48 2.08 1.08 3 1.77l.01.01c-.03.01-.07.04-.1.08z"
                        fill="#5cd6b3"
                      />
                    </g>
                    <g>
                      <path
                        d="m24.48 29.93.16.61c-.02.02-.03.03-.05.05-.37.36-.59.86-.59 1.41 0 .54.21 1.03.58 1.39l-.01.01-.35 2.85c-.13 1-.98 1.75-1.99 1.75h-.23-4-.23c-1.01 0-1.86-.75-1.99-1.75l-.28-2.25-.5-4 3.86-2.32c.71 1 1.81 1.7 3.1 1.89z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m22 38 1 2-.11.21c-.54 1.1-1.66 1.79-2.89 1.79s-2.35-.69-2.89-1.79l-.11-.21 1-2z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m15 30 .5 4h-1.5c-1.1 0-2-.9-2-2 0-.55.22-1.05.59-1.41.02-.02.03-.03.05-.04.35-.35.83-.55 1.36-.55z"
                        fill="#f0d0b4"
                      />
                    </g>
                  </g>
                  <path d="m31 51h2v2h-2z" />
                  <path d="m31 47h2v2h-2z" />
                  <path
                    d="m60.095 14.46-25.994-11.997c-1.31-.606-2.894-.605-4.195-.003l-26 11.999c-1.213.561-2.136 1.559-2.599 2.812-.462 1.255-.408 2.611.15 3.819.353.766.893 1.404 1.543 1.892v35.018c0 2.757 2.243 5 5 5h48c2.757 0 5-2.243 5-5v-35.018c.648-.487 1.188-1.123 1.539-1.885.561-1.212.615-2.57.153-3.826-.463-1.253-1.385-2.251-2.597-2.811zm-56.91 3.504c.277-.753.831-1.353 1.56-1.688l26-12c.781-.361 1.728-.362 2.517.003l25.996 11.998c.728.335 1.281.935 1.559 1.687.277.753.245 1.567-.092 2.295-.49 1.057-1.559 1.741-2.726 1.741-.437 0-.858-.093-1.254-.275l-24.745-11.421-24.743 11.42c-.398.183-.82.276-1.257.276-1.168 0-2.237-.685-2.726-1.747-.335-.724-.367-1.537-.089-2.289zm45.815 31.036v6h-4v-1.151c0-4.645-2.001-8.977-5.337-11.991.33-.206.67-.391 1.016-.569.958 1.005 2.652 1.557 3.038 1.671l.283.083.283-.084c.388-.114 2.095-.67 3.05-1.683 4.682 2.416 7.667 7.261 7.667 12.573v1.151h-4v-6zm-12 0v6h-10v-6h-2v6h-4v-1.151c0-4.074 1.76-7.871 4.689-10.512l2.066 3.098 4.245-3.185 4.246 3.185 2.065-3.098c2.929 2.641 4.689 6.438 4.689 10.512v1.151h-4v-6zm-24 0v6h-4v-1.151c0-5.293 2.964-10.123 7.616-12.548.79 1.059 2.027 1.699 3.384 1.699 1.351 0 2.582-.634 3.373-1.685.328.171.651.347.964.543-3.336 3.013-5.337 7.346-5.337 11.991v1.151h-4v-6zm1-18h.117l.25 2h-.367c-.552 0-1-.448-1-1s.448-1 1-1zm.723-2h-.723c-.241 0-.472.036-.697.09l-.173-.694c-.086-.346-.13-.7-.13-1.054 0-2.394 1.948-4.342 4.343-4.342h5.314c.613 0 1.198.138 1.742.378-.874 1.087-1.4 2.465-1.4 3.964 0 .465.059.928.161 1.384l-1.059-.151c-1.768-.252-3.101-1.789-3.101-3.575h-2c0 .824.2 1.603.529 2.317zm26.277-3.162v-2.811c.114-.009.227-.027.343-.027h5.314c2.395 0 4.343 1.948 4.343 4.343 0 .354-.044.708-.129 1.053l-.174.695c-.224-.055-.456-.091-.697-.091h-.902l-1.96-.393c-1.24-.248-2.138-1.343-2.138-2.607h-2c0 .627.138 1.225.369 1.778-.667.338-1.585.736-2.588.984.14-.968.219-1.946.219-2.924zm8.883 5.162h.117c.552 0 1 .448 1 1s-.448 1-1 1h-.367zm-31.265 8h2.764l.482.963c-.409.637-1.094 1.037-1.864 1.037s-1.454-.4-1.863-1.037zm5.118.237-.26-.519c.919-.422 1.602-1.287 1.734-2.346l.179-1.435c.198.041.402.063.611.063h.617l.172 1.372c.132 1.058.815 1.923 1.734 2.346l-.26.52c-.802.378-1.558.824-2.274 1.318-.718-.494-1.464-.947-2.253-1.319zm2.264-8.237h.117l.25 2h-.367c-.552 0-1-.448-1-1s.448-1 1-1zm13 1c0 .552-.448 1-1 1h-.367l.25-2h.117c.552 0 1 .448 1 1zm-3.114-1.149-.659 5.273c-.063.499-.49.876-.993.876h-4.469c-.503 0-.93-.377-.992-.876l-.709-5.672 2.037-1.528c.684.785 1.639 1.335 2.727 1.49zm-3.886 9.947-1.71-1.14.328-.658h2.763l.329.658zm-3.077.353 1.346.898-2.024 1.517-.975-1.462c.525-.353 1.077-.671 1.653-.953zm6.154 0c.576.283 1.127.601 1.652.953l-.975 1.462-2.023-1.517zm.66-1.914-.26-.52c.919-.422 1.602-1.287 1.734-2.346l.172-1.371h.617c.209 0 .413-.022.61-.063l.179 1.435c.132 1.059.815 1.924 1.734 2.346l-.26.519c-.788.372-1.534.825-2.252 1.318-.716-.493-1.472-.939-2.274-1.318zm6.881-.237h2.764l.473.947c-.342.344-1.132.751-1.855 1.002-.723-.252-1.514-.658-1.856-1.002zm3.616-2h-4.469c-.503 0-.93-.377-.992-.876l-.303-2.427c.333-.484.53-1.067.53-1.697 0-.42-.088-.82-.245-1.184 1.521-.302 2.886-.918 3.77-1.385.61.559 1.366.966 2.221 1.137l1.147.229-.666 5.326c-.063.5-.49.877-.993.877zm-7.234-11.162c0 1.091-.101 2.181-.293 3.255-.228-.055-.462-.093-.707-.093h-.838c-1.293-.432-2.162-1.637-2.162-3h-2c0 .905.244 1.761.664 2.513l-.553-.079c-1.204-.172-2.111-1.218-2.111-2.434h-2c0 .392.052.773.149 1.138l-2.483 1.862h-.666c-.241 0-.472.036-.697.09l-.173-.694c-.086-.346-.13-.7-.13-1.054 0-2.394 1.948-4.342 4.343-4.342h9.657zm-20.323 3.122c.833.83 1.912 1.42 3.141 1.595l1.456.208c-.172.379-.274.795-.274 1.237 0 .63.197 1.214.53 1.697l-.303 2.427c-.063.499-.49.876-.993.876h-4.469c-.503 0-.93-.377-.992-.876l-.7-5.602zm29.06 10.277-.26-.52c.919-.422 1.602-1.287 1.734-2.346l.172-1.371h.617c1.654 0 3-1.346 3-3 0-.636-.202-1.225-.542-1.711l.353-1.41c.126-.503.189-1.02.189-1.536 0-3.497-2.846-6.343-6.343-6.343h-5.314c-.507 0-1.004.079-1.492.197-.26-.123-.546-.197-.851-.197h-9.657c-1.231 0-2.378.359-3.352.968-.998-.618-2.151-.968-3.334-.968h-5.314c-3.497 0-6.343 2.846-6.343 6.343 0 .517.063 1.033.189 1.537l.352 1.409c-.339.486-.541 1.074-.541 1.711 0 1.654 1.346 3 3 3h.617l.172 1.372c.132 1.058.815 1.923 1.734 2.346l-.26.52c-3.139 1.481-5.65 3.903-7.263 6.838v-22.954l23-10.615 23 10.616v22.953c-1.613-2.935-4.124-5.358-7.263-6.839zm11.263 18.763c0 1.654-1.346 3-3 3h-48c-1.654 0-3-1.346-3-3v-34.114c.327.067.659.114 1 .114.339 0 .673-.037 1-.104v33.104h50v-33.103c.327.066.66.103.999.103.341 0 .674-.047 1.001-.114z"
                  />
                </g>
              </svg>
              <br /><br />
              <h4>MOS HARRONI T'I LANI DUART</h4>
              <br />
              <svg
                id="Layer_2"
                enable-background="new 0 0 64 64"
                height="150"
                viewBox="0 0 64 64"
                width="150"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g>
                  <g>
                    <g>
                      <path
                        d="m30 50v12h-20v-11c0-1.3-.42-2.56-1.2-3.6l-2.4-3.2c-1.56-2.08-2.4-4.6-2.4-7.2v-6.1c0-3.24-.62-6.44-1.82-9.45-.12-.3-.18-.61-.18-.93 0 0 0 0 0-.01 0-1.38 1.12-2.51 2.53-2.51h.09c1.28 0 2.46.45 3.38 1.2 1.22.98 2 2.49 2 4.18v4.62 1l.42.21c2.19 1.1 3.58 3.34 3.58 5.79v15c0 1.1.9 2 2 2 .55 0 1.05-.22 1.41-.59.37-.36.59-.86.59-1.41v-2c0-1.1.9-2 2-2 .55 0 1.05.22 1.41.59.37.36.59.86.59 1.41v8c0 1.1.9 2 2 2 .55 0 1.05-.22 1.41-.59.37-.36.59-.86.59-1.41v-6c0-1.1.9-2 2-2 .55 0 1.05.22 1.41.59.37.36.59.86.59 1.41z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m24 42c0 3.31 2.69 6 6 6 .21 0 .42-.01.62-.03-.19.68-.4 1.36-.62 2.03 0-.55-.22-1.05-.59-1.41-.36-.37-.86-.59-1.41-.59-1.1 0-2 .9-2 2v6c0 .55-.22 1.05-.59 1.41-.36.37-.86.59-1.41.59-1.1 0-2-.9-2-2v-8c0-.55-.22-1.05-.59-1.41-.36-.37-.86-.59-1.41-.59-1.1 0-2 .9-2 2v2c0 .55-.22 1.05-.59 1.41-.36.37-.86.59-1.41.59-1.1 0-2-.9-2-2v-15c0-2.45-1.39-4.69-3.58-5.79l-.42-.21v-1c1.28-.64 2.62-1.13 4-1.47 1.46-.35 2.96-.53 4.47-.53h1.53 2.07.01c-.06.33-.08.66-.08 1 0 1.38.41 2.67 1.1 3.75-1.85 1.02-3.1 2.99-3.1 5.25 0 2.62 1.68 4.84 4.02 5.66-.01.11-.02.22-.02.34z"
                        fill="#3bafda"
                      />
                    </g>
                    <g>
                      <path
                        d="m26 20.67v.01c-2.08.98-3.59 2.96-3.92 5.32h-.01-2.07v-17c0-.83.34-1.58.88-2.12s1.29-.88 2.12-.88c1.66 0 3 1.34 3 3v4z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m14 9v17.53c-1.38.34-2.72.83-4 1.47v-4.62c0-1.69-.78-3.2-2-4.18v-.01-10.19c0-1.66 1.34-3 3-3 .83 0 1.58.34 2.12.88s.88 1.29.88 2.12z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m20 9v17h-1.53c-1.51 0-3.01.18-4.47.53v-17.53-4c0-1.66 1.34-3 3-3 .83 0 1.58.34 2.12.88s.88 1.29.88 2.12z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m32 15.53c-1.23 1.1-2 2.7-2 4.47v.08c-.32-.05-.66-.08-1-.08-1.08 0-2.09.24-3 .68v-.01-7.67c0-1.66 1.34-3 3-3 .83 0 1.58.34 2.12.88s.88 1.29.88 2.12z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m44.66 27.85 2.64-4.63c.46-.8.7-1.7.7-2.62 0-1.04-.31-2.06-.89-2.93l-1.58-2.38-2.88-4.32c-.42-.63-.65-1.38-.65-2.14 0-.25.03-.48.1-.71.12-.5.38-.94.73-1.29.51-.51 1.22-.83 2-.83.75 0 1.47.3 2 .83l5.66 5.66c1.29 1.29 2.25 2.83 2.84 4.52.44 1.26.67 2.6.67 3.96v2.03l-.01.1c-2.28.47-3.99 2.48-3.99 4.9 0 .63.13 1.23.34 1.78-1.4.89-2.34 2.44-2.34 4.22 0 1.27.49 2.42 1.28 3.31-.8 1.02-1.28 2.3-1.28 3.69 0 3.31 2.69 6 6 6 .09 0 .17 0 .25-.01.17 5.01.42 10.01.75 15.01h-15v-9.33c0-.67-.08-1.34-.25-1.99-.26-1.01-.71-1.97-1.35-2.81l-.66-.88-2.16-2.88c-.01-.02-.03-.04-.04-.06-1.01-1.36-1.54-2.99-1.54-4.68v-.05c0-.88.14-1.73.41-2.56.09-.27.19-.57.3-.89.13-.41.28-.85.42-1.27.2-.58.36-1.17.49-1.77v-.01c.25-1.17.38-2.36.38-3.56s-.13-2.39-.38-3.56c-.2-.93-.48-1.84-.83-2.72l-.61-1.53c-.12-.29-.18-.6-.18-.91 0-.01 0-.01 0-.02 0 0 0 0 0-.01 0-1.38 1.12-2.51 2.53-2.51.61 0 1.2.09 1.75.27.85.26 1.61.72 2.24 1.31.14.13.28.28.41.42.82.94 1.34 2.13 1.43 3.46l.29 4.39z"
                        fill="#f0d0b4"
                      />
                    </g>
                    <g>
                      <path
                        d="m47.11 17.67c.58.87.89 1.89.89 2.93 0 .92-.24 1.82-.7 2.62l-2.64 4.63h-.01l-.29-4.39c-.09-1.33-.61-2.52-1.43-3.46h.07c1.66 0 3-1.34 3-3 0-.62-.19-1.2-.51-1.68l.04-.03z"
                        fill="#69d6f4"
                      />
                    </g>
                    <g>
                      <path
                        d="m42.65 10.97c-.42-.63-.65-1.38-.65-2.14 0-.25.03-.48.1-.71h-.01c-.35-.08-.72-.12-1.09-.12-2.76 0-5 2.24-5 5 0 .34.04.68.1 1.01-.03-.01-.07-.01-.1-.01-1.54 0-2.94.58-4 1.53-1.23 1.1-2 2.7-2 4.47v.08c-.32-.05-.66-.08-1-.08-1.08 0-2.09.24-3 .68-2.08.98-3.59 2.96-3.92 5.32-.06.33-.08.66-.08 1 0 1.38.41 2.67 1.1 3.75-1.85 1.02-3.1 2.99-3.1 5.25 0 2.62 1.68 4.84 4.02 5.66-.01.11-.02.22-.02.34 0 3.31 2.69 6 6 6 .21 0 .42-.01.62-.03.56-.06 1.09-.19 1.6-.4.69 2.55 3.01 4.43 5.78 4.43 1.42 0 2.72-.49 3.75-1.32-.26-1.01-.71-1.97-1.35-2.81l-.66-.88c-.34.6-.99 1.01-1.74 1.01-1.1 0-2-.9-2-2 0-.95.66-1.74 1.54-1.95-1.01-1.36-1.54-2.99-1.54-4.68v-.05c0-.88.14-1.73.41-2.56.09-.27.19-.57.3-.89-.22.08-.46.13-.71.13-1.1 0-2-.9-2-2s.9-2 2-2c.67 0 1.25.33 1.62.82.25-1.17.38-2.36.38-3.56s-.13-2.39-.38-3.56c-.64 1.36-2.02 2.3-3.62 2.3-2.21 0-4-1.79-4-4 0-1.1.45-2.1 1.17-2.83.73-.72 1.73-1.17 2.83-1.17.73 0 1.41.19 2 .54 0-.01 0-.01 0-.02 0 0 0 0 0-.01 0-1.38 1.12-2.51 2.53-2.51.61 0 1.2.09 1.75.27-.18-.39-.28-.82-.28-1.27 0-1.66 1.34-3 3-3 1.04 0 1.95.52 2.49 1.32l.04-.03z"
                        fill="#69d6f4"
                      />
                    </g>
                    <g>
                      <path
                        d="m37.58 44.11 2.16 2.88c-.34.6-.99 1.01-1.74 1.01-1.1 0-2-.9-2-2 0-.95.66-1.74 1.54-1.95.01.02.03.04.04.06z"
                        fill="#3bafda"
                      />
                    </g>
                    <g><circle cx="30" cy="42" fill="#3bafda" r="2" /></g>
                    <g>
                      <path
                        d="m37.13 34.6c-.14.42-.29.86-.42 1.27-.22.08-.46.13-.71.13-1.1 0-2-.9-2-2s.9-2 2-2c.67 0 1.25.33 1.62.82v.01c-.13.6-.29 1.19-.49 1.77z"
                        fill="#3bafda"
                      />
                    </g>
                    <g><circle cx="26" cy="32" fill="#3bafda" r="2" /></g>
                    <g>
                      <path
                        d="m36.79 22.98c.35.88.63 1.79.83 2.72-.64 1.36-2.02 2.3-3.62 2.3-2.21 0-4-1.79-4-4 0-1.1.45-2.1 1.17-2.83.73-.72 1.73-1.17 2.83-1.17.73 0 1.41.19 2 .54 0 .31.06.62.18.91z"
                        fill="#3bafda"
                      />
                    </g>
                    <g>
                      <path
                        d="m46 17c0 1.66-1.34 3-3 3-.02 0-.04 0-.07 0-.13-.14-.27-.29-.41-.42-.63-.59-1.39-1.05-2.24-1.31-.18-.39-.28-.82-.28-1.27 0-1.66 1.34-3 3-3 1.04 0 1.95.52 2.49 1.32.32.48.51 1.06.51 1.68z"
                        fill="#3bafda"
                      />
                    </g>
                    <g>
                      <path
                        d="m61.36 25.55c.41.73.64 1.56.64 2.45 0 1.78-.94 3.33-2.34 4.22.21.55.34 1.15.34 1.78 0 .77-.19 1.49-.5 2.14 1.51 1.09 2.5 2.86 2.5 4.86 0 3.23-2.55 5.86-5.75 5.99-.08.01-.16.01-.25.01-3.31 0-6-2.69-6-6 0-1.39.48-2.67 1.28-3.69-.79-.89-1.28-2.04-1.28-3.31 0-1.78.94-3.33 2.34-4.22-.21-.55-.34-1.15-.34-1.78 0-2.42 1.71-4.43 3.99-4.9l.01-.1v-2.03c0-1.36-.23-2.7-.67-3.96 2.61.17 4.67 2.34 4.67 4.99 0 .63-.11 1.22-.32 1.78.7.44 1.28 1.05 1.68 1.77z"
                        fill="#69d6f4"
                      />
                    </g>
                    <g><circle cx="56" cy="41" fill="#3bafda" r="2" /></g>
                    <g><circle cx="58" cy="29" fill="#3bafda" r="2" /></g>
                  </g>
                  <path d="m13 37h2v2h-2z" />
                  <path
                    d="m30 39c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3zm0 4c-.552 0-1-.449-1-1s.448-1 1-1 1 .449 1 1-.448 1-1 1z"
                  />
                  <path
                    d="m53 41c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3zm3-1c.552 0 1 .449 1 1s-.448 1-1 1-1-.449-1-1 .448-1 1-1z"
                  />
                  <path
                    d="m63 28c0-1.805-.796-3.479-2.161-4.613.107-.452.161-.917.161-1.387 0-2.928-2.122-5.404-4.942-5.907-.646-1.596-1.611-3.061-2.865-4.315l-5.657-5.656c-.724-.724-1.684-1.122-2.708-1.122-1.455 0-2.709.826-3.356 2.026-.157-.013-.314-.026-.472-.026-3.309 0-6 2.691-6 6v.071c-.708.102-1.377.32-2 .618v-.689c0-2.206-1.794-4-4-4-.732 0-1.409.212-2 .556v-.556c0-2.206-1.794-4-4-4-.732 0-1.409.212-2 .556v-.556c0-2.206-1.794-4-4-4s-4 1.794-4 4v.556c-.591-.344-1.268-.556-2-.556-2.206 0-4 1.794-4 4v8.48c-.759-.308-1.592-.48-2.471-.48-1.946 0-3.529 1.577-3.529 3.516 0 .447.084.886.251 1.306 1.16 2.901 1.749 5.955 1.749 9.079v6.099c0 2.795.924 5.565 2.601 7.8l2.399 3.2c.645.859 1 1.925 1 3v12h49.069l-.071-1.066c-.311-4.66-.545-9.382-.711-14.057 3.246-.608 5.713-3.457 5.713-6.877 0-1.973-.846-3.855-2.296-5.175.196-.597.296-1.209.296-1.825 0-.463-.058-.929-.173-1.393 1.373-1.134 2.173-2.807 2.173-4.607zm-16-7.402c0 .744-.195 1.478-.563 2.123l-1.002 1.754-.072-1.082c-.065-.981-.344-1.9-.779-2.723.874-.379 1.576-1.067 1.995-1.919.276.574.421 1.202.421 1.847zm-5.934-3.108c-.04-.159-.066-.322-.066-.49 0-1.103.897-2 2-2s2 .897 2 2c0 .985-.717 1.8-1.688 1.964-.642-.628-1.402-1.134-2.246-1.474zm-5.082-2.49 1.347.022-.25-1.218c-.054-.263-.081-.533-.081-.804 0-2.206 1.794-4 4-4 .004 0 .008.001.013.001.032.902.302 1.773.805 2.528l.993 1.49c-2.117.101-3.811 1.84-3.811 3.981 0 .008.002.015.003.023-.157-.011-.314-.023-.474-.023-1.466 0-2.724.896-3.257 2.166-.413-.109-.841-.166-1.272-.166-1.13 0-2.162.391-3 1.026v-.026c0-2.757 2.243-5 4.984-5zm-4.589 33.849c.067-.014.134-.02.201-.035 1.102 2.508 3.606 4.186 6.404 4.186 1.033 0 2.044-.253 2.971-.689.006.119.029.236.029.356v8.333h-10v-10.839c.143-.434.267-.873.395-1.312zm5.861-3.508 1.167 1.556c-.132.062-.274.103-.423.103-.552 0-1-.449-1-1 0-.253.098-.481.256-.659zm.744 3.659c.588 0 1.144-.186 1.623-.496.401.542.712 1.144.942 1.776-.773.466-1.644.72-2.565.72-2.248 0-4.23-1.517-4.82-3.69l-.294-1.082-1.041.416c-.594.236-1.214.356-1.845.356-2.757 0-5-2.243-5-5 0-.062.005-.122.009-.182l.053-.854-.713-.25c-2.003-.702-3.349-2.597-3.349-4.714 0-1.582.753-3.059 2-3.997.002 1.653 1.347 2.997 3 2.997 1.654 0 3-1.346 3-3s-1.346-3-3-3c-.868 0-1.645.377-2.193.968-.521-.907-.807-1.923-.807-2.968 0-3.309 2.691-6 6-6 .258 0 .531.022.861.07l.1.008c-.598.823-.961 1.828-.961 2.922 0 2.757 2.243 5 5 5 1.077 0 2.099-.362 2.942-.976.031.409.058.819.058 1.232 0 .634-.05 1.265-.125 1.891-.283-.086-.574-.147-.875-.147-1.654 0-3 1.346-3 3 0 1.422.997 2.611 2.328 2.918-.214.78-.328 1.591-.328 2.448 0 1.504.395 2.993 1.118 4.306-.688.554-1.118 1.393-1.118 2.328 0 1.654 1.346 3 3 3zm-13-17c0-.551.448-1 1-1s1 .449 1 1-.448 1-1 1-1-.449-1-1zm10.077-10.774c.042.202.097.401.174.596l.611 1.526c.29.726.508 1.471.688 2.224-.543.875-1.507 1.428-2.55 1.428-1.654 0-3-1.346-3-3s1.346-3 3-3c.374 0 .733.092 1.077.226zm1.108 13.059-.233.7c-.499-.04-.952-.454-.952-.985 0-.551.448-1 1-1 .188 0 .357.063.511.156-.096.379-.202.756-.326 1.129zm-7.185-23.285c1.103 0 2 .897 2 2v2.128c-.999 1.031-1.693 2.368-1.917 3.872-.027 0-.056 0-.083 0-.692 0-1.359.097-2 .263v-6.263c0-1.103.897-2 2-2zm-6-4c1.103 0 2 .897 2 2v11.082c-1.828 1.061-3.195 2.823-3.737 4.918h-.263v-16c0-1.103.897-2 2-2zm-8-2c0-1.103.897-2 2-2s2 .897 2 2v20h-.528c-1.163 0-2.326.104-3.472.308zm-6 4c0-1.103.897-2 2-2s2 .897 2 2v16.774c-.679.193-1.346.425-2 .688v-3.081c0-1.816-.766-3.453-2-4.616zm.6 37.8-2.4-3.2c-1.419-1.891-2.2-4.235-2.2-6.6v-6.099c0-3.379-.637-6.684-1.892-9.821-.072-.182-.108-.372-.108-.565 0-.835.687-1.515 1.619-1.515 2.416 0 4.381 1.965 4.381 4.381v6.237l.975.487c1.866.934 3.025 2.809 3.025 4.895h2c0-2.705-1.437-5.141-3.764-6.471 2.272-1 4.755-1.529 7.236-1.529h2.528c0 1.188.266 2.355.773 3.422-1.731 1.313-2.773 3.372-2.773 5.578 0 2.719 1.583 5.175 4.008 6.322.103 2.253 1.278 4.226 3.023 5.433-.627.55-1.031 1.348-1.031 2.245v6c0 .551-.448 1-1 1s-1-.449-1-1v-8c0-1.654-1.346-3-3-3s-3 1.346-3 3v2c0 .551-.448 1-1 1s-1-.449-1-1v-9h-2v9c0 1.654 1.346 3 3 3s3-1.346 3-3v-2c0-.551.448-1 1-1s1 .449 1 1v8c0 1.654 1.346 3 3 3s3-1.346 3-3v-6c0-.551.448-1 1-1s1 .449 1 1v11h-18v-10c0-1.505-.497-2.997-1.4-4.2zm33.4 14.2v-8.333c0-1.935-.64-3.853-1.801-5.4l-2.817-3.757c-.892-1.187-1.382-2.659-1.382-4.19 0-.769.121-1.522.36-2.24l.722-2.162c.609-1.83.918-3.734.918-5.662 0-2.289-.431-4.526-1.28-6.651l-.611-1.525c-.073-.182-.109-.372-.109-.565 0-.835.687-1.515 1.529-1.515 2.543 0 4.668 1.988 4.837 4.526l.487 7.31c.115 1.729 1.149 3.284 2.699 4.059l.895-1.789c-.918-.458-1.53-1.379-1.598-2.403l-.174-2.618 2.498-4.371c.541-.947.827-2.025.827-3.116 0-1.244-.365-2.448-1.055-3.482l-4.464-6.695c-.314-.474-.481-1.025-.481-1.592 0-1.009.82-1.829 1.828-1.829.481 0 .952.195 1.293.536l5.657 5.657c2.077 2.078 3.222 4.84 3.222 7.778l.002 1.371c-2.36.834-4.002 3.097-4.002 5.658 0 .463.058.929.173 1.393-1.373 1.134-2.173 2.807-2.173 4.607 0 1.188.364 2.349 1.037 3.34-.681 1.1-1.037 2.351-1.037 3.66 0 3.62 2.762 6.607 6.289 6.964.153 4.334.365 8.708.643 13.036zm15-31c-.552 0-1-.449-1-1s.448-1 1-1 1 .449 1 1-.448 1-1 1zm2.956-1.433c-.212-1.448-1.45-2.567-2.956-2.567-1.654 0-3 1.346-3 3s1.346 3 3 3c.166 0 .327-.023.486-.049l.239.626c.182.478.275.956.275 1.423 0 .575-.135 1.149-.399 1.708l-.357.752.676.488c1.302.94 2.08 2.455 2.08 4.052 0 2.757-2.243 5-5 5s-5-2.243-5-5c0-1.123.368-2.186 1.064-3.075l.515-.657-.555-.624c-.66-.744-1.024-1.683-1.024-2.644 0-1.372.701-2.633 1.875-3.375l.692-.438-.292-.765c-.182-.477-.275-.955-.275-1.422 0-1.892 1.343-3.54 3.192-3.919l.739-.151.058-.752.011-2.207c0-.873-.085-1.732-.252-2.569 1.336.652 2.252 2.027 2.252 3.598 0 .489-.087.967-.26 1.421l-.288.762.688.437c1.165.739 1.86 2.003 1.86 3.38 0 .192-.017.381-.044.567z"
                  />
                </g>
              </svg>
            </div>
          </tab-content>
        </form-wizard>
      </div>
    </div>
    <div class="text-center" v-else>
      <div class="p-2">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          version="1.1"
          id="Layer_1_1_"
          x="0px"
          y="0px"
          viewBox="0 0 64 64"
          style="enable-background: new 0 0 64 64"
          xml:space="preserve"
          width="150"
          height="150"
        >
          <g>
            <g>
              <polygon
                style="fill: #969faa"
                points="30,56 30,62 10,62 10,56 12,56 28,56   "
              />
              <path
                style="fill: #f0d0b4"
                d="M23,23.91v-6.7c0-0.79-0.23-1.56-0.67-2.22l-2.69-4.02c-0.42-0.64-1.01-1.13-1.7-1.44l-6.5-2.89    C10.56,6.25,10,5.38,10,4.42C10,3.09,11.09,2,12.42,2h0.19c0.26,0,0.52,0.04,0.76,0.12l7.33,2.45c0.74,0.25,1.39,0.7,1.87,1.3    L22.33,5.5C22.12,5.17,22,4.79,22,4.4V3.99C22,2.89,22.89,2,23.99,2c0.63,0,1.23,0.3,1.61,0.82l6.63,9.13    c0.5,0.68,0.77,1.51,0.77,2.35v12.36v0.01c-1.89,2.63-3,5.85-3,9.33c0,2.57,0.61,5,1.69,7.15l-2.81,6.74    C28.3,51.28,28,52.78,28,54.28V56H12c0-2.59-0.88-5.1-2.5-7.12l-0.63-0.8c-0.58-0.72-1.07-1.5-1.45-2.34L2.37,34.8    C2.13,34.27,2,33.7,2,33.12V23c0-0.55,0.45-1,1-1l1.25,0.16c2.17,1.19,2.23,1.25,2.29,1.3C7.44,24.37,8,25.62,8,27v4    c0,0.63,0.3,1.22,0.8,1.6l2,1.5c0.78,0.58,1.73,0.9,2.7,0.9c1.24,0,2.37-0.5,3.18-1.32C17.5,32.87,18,31.74,18,30.5v-4    c0-2.49-2.01-4.5-4.5-4.5h-9c-0.07,0-0.14-0.01-0.2-0.02c-0.46-0.09-0.8-0.5-0.8-0.98c0-1.1,0.45-2.1,1.17-2.83    C5.4,17.45,6.4,17,7.5,17h9.89c1.01,0,1.94,0.5,2.5,1.34l2.61,3.9C22.82,22.74,23,23.32,23,23.91z"
              />
              <path
                style="fill: #b4dd7f"
                d="M46,20c8.84,0,16,7.16,16,16s-7.16,16-16,16c-6.27,0-11.69-3.6-14.31-8.85C30.61,41,30,38.57,30,36    c0-3.48,1.11-6.7,3-9.33v-0.01C35.91,22.63,40.65,20,46,20z"
              />
              <circle style="fill: #e6e9ed" cx="46" cy="36" r="12" />
            </g>
            <g>
              <path
                d="M46,19c-4.68,0-8.923,1.901-12,4.971v-9.67c0-1.063-0.33-2.081-0.956-2.94l-6.64-9.131C25.844,1.46,24.94,1,23.987,1    c-1.524,0-2.77,1.151-2.951,2.628c-0.008-0.003-0.014-0.007-0.022-0.009l-7.326-2.443C13.339,1.059,12.975,1,12.606,1h-0.182    C10.536,1,9,2.536,9,4.425c0,1.352,0.798,2.58,2.033,3.129l6.5,2.889c0.521,0.231,0.963,0.604,1.278,1.077l2.685,4.027    C21.826,16.041,22,16.616,22,17.211v2.486l-1.277-1.916C19.979,16.666,18.735,16,17.395,16H7.5c-2.757,0-5,2.243-5,5    c0,0.021,0,0.042,0.001,0.063C1.639,21.285,1,22.069,1,23v10.121c0,0.718,0.159,1.442,0.46,2.096l5.05,10.941    c0.421,0.911,0.951,1.77,1.576,2.55l0.635,0.794C9.981,51.077,10.752,53,10.947,55H9v8h22v-8h-2v-0.72    c0-1.381,0.27-2.728,0.8-4.001l2.039-4.893C34.887,49.97,40.094,53,46,53c9.374,0,17-7.626,17-17S55.374,19,46,19z M29,61H11v-4    h18V61z M27.954,49.51C27.321,51.028,27,52.634,27,54.28V55H12.957c-0.201-2.454-1.132-4.819-2.675-6.747l-0.635-0.794    c-0.524-0.655-0.969-1.375-1.321-2.139l-5.05-10.941C3.096,33.987,3,33.552,3,33.121V23c2.206,0,4,1.794,4,4v4    c0,0.939,0.448,1.837,1.2,2.399l1.999,1.5C11.146,35.609,12.317,36,13.5,36c3.032,0,5.5-2.468,5.5-5.5v-4    c0-3.032-2.468-5.5-5.5-5.5h-9c0-1.654,1.346-3,3-3h9.895c0.67,0,1.292,0.333,1.664,0.891l2.604,3.907    C21.884,23.129,22,23.513,22,23.908V29h2v-5.092v-6.697c0-0.991-0.29-1.95-0.84-2.773l-2.685-4.027    c-0.525-0.788-1.262-1.409-2.13-1.796l-6.5-2.889C11.332,5.498,11,4.987,11,4.425C11,3.639,11.639,3,12.425,3h0.182    c0.153,0,0.306,0.024,0.45,0.072l7.325,2.442c0.628,0.209,1.176,0.627,1.544,1.177l3.242,4.863l0,0l1.328,1.992    C26.826,14.041,27,14.616,27,15.211V29h2V15.211c0-0.991-0.29-1.95-0.84-2.773l-4.566-6.852c-0.003-0.005-0.008-0.009-0.012-0.014    l-0.416-0.624C23.058,4.783,23,4.594,23,4.398v-0.41C23,3.443,23.443,3,23.987,3c0.315,0,0.614,0.152,0.8,0.406l6.64,9.13    C31.802,13.053,32,13.662,32,14.301v12.077c-1.888,2.739-3,6.052-3,9.622c0,2.559,0.585,4.978,1.601,7.157L27.954,49.51z     M7.469,23H13.5c1.93,0,3.5,1.57,3.5,3.5v4c0,1.93-1.57,3.5-3.5,3.5c-0.753,0-1.498-0.249-2.101-0.7l-2-1.5    C9.149,31.612,9,31.313,9,31v-4C9,25.465,8.42,24.062,7.469,23z M46,51c-8.271,0-15-6.729-15-15s6.729-15,15-15s15,6.729,15,15    S54.271,51,46,51z"
              />
              <polygon
                points="52.293,29.293 42,39.586 39.707,37.293 38.293,38.707 42,42.414 53.707,30.707   "
              />
              <path
                d="M46,47c-6.065,0-11-4.935-11-11c0-2.595,0.925-5.115,2.604-7.098l-1.525-1.293C34.094,29.953,33,32.933,33,36    c0,7.168,5.832,13,13,13c3.067,0,6.047-1.094,8.391-3.079l-1.293-1.525C51.115,46.075,48.595,47,46,47z"
              />
              <path
                d="M46,23c-3.067,0-6.047,1.094-8.391,3.079l1.293,1.525C40.885,25.925,43.405,25,46,25c6.065,0,11,4.935,11,11    c0,2.595-0.925,5.115-2.604,7.098l1.525,1.293C57.906,42.047,59,39.067,59,36C59,28.832,53.168,23,46,23z"
              />
            </g>
          </g>
        </svg>
        <h4>Faleminderit qe e plotesuat</h4>
        <br />
      </div>
    </div>
  </div>
</template>

<script>
import VueFormWizard from "vue-form-wizard";
import Navbar from "./Navbar";
import { required } from "vuelidate/lib/validators";
import axios from "axios";

export default {
  data() {
    return {
      finished: false,
      name: "",
      phone: "",
      questions: [],
      answers: [],
      question: {
        question_1: "",
      },
      finalModel: {},
    };
  },
  components: {
    Navbar,
    VueFormWizard,
  },
  validations: {
    name: {
      required,
    },
    phone: {
      required,
    },
  },
  created() {
    this.getQuestions();
  },
  methods: {
    next() {
      return new Promise((resolve, reject) => {
        this.$v.$touch();
        if (this.$v.name.required) {
          resolve(true);
        } else {
          reject(true);
        }
      });
    },
    onComplete() {
      this.finished = true;
      let data = {
        name:this.name,
        phone:this.phone,
        answers:this.answers
      }

       axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("access_token");

      axios
        .post("/api/survey", {
          data: data,
        })
        .then(() => {
          // console.log(response);
          // this.$router.push("/");
        })
        .catch((error) => console.log(error));
    },
    getQuestions() {
      axios.get("/api/questions").then((response) => {
        this.questions = response.data;
        // console.log(this.questions[0].content);
      });
    },
    mergePartialModels(model, isValid) {
      if (isValid) {
        // merging each step model into the final model
        this.finalModel = Object.assign({}, this.finalModel, model);
      }
    },

    addAnswer(id, answer) {
      var index = this.answers
        .map(function (e) {
          return e.id;
        })
        .indexOf(id);
        console.log(index)
      if (index !== -1) {
        this.answers.splice(index,1);
      }
      // console.log(index);
      var obj = {
        id: id,
        answer: answer,
      };
      this.answers.push(obj);
      // console.log("TEST");
    },
  },
};
</script>

<style scoped>
@import url("https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css");
</style>